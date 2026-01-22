<?php

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

describe('authorization', function () {
    it('guest cannot access projects list page', function () {
        $this->get(ProjectResource::getUrl('index'))
            ->assertRedirect('/admin/login');
    });

    it('authenticated user can render list page via Livewire', function () {
        $this->actingAs($this->user);

        Livewire::test(ListProjects::class)
            ->assertOk();
    });
});

describe('list page', function () {
    it('can render the list page', function () {
        $this->actingAs($this->user);

        Livewire::test(ListProjects::class)
            ->assertOk();
    });

    it('can list projects', function () {
        $this->actingAs($this->user);
        $projects = Project::factory()->count(3)->create();

        Livewire::test(ListProjects::class)
            ->assertCanSeeTableRecords($projects);
    });

    it('can filter projects by active status', function () {
        $this->actingAs($this->user);

        $activeProject = Project::factory()->create(['is_active' => true]);
        $inactiveProject = Project::factory()->create(['is_active' => false]);

        Livewire::test(ListProjects::class)
            ->filterTable('is_active', true)
            ->assertCanSeeTableRecords([$activeProject])
            ->assertCanNotSeeTableRecords([$inactiveProject]);
    });
});

describe('create page', function () {
    it('can render the create page', function () {
        $this->actingAs($this->user);

        Livewire::test(CreateProject::class)
            ->assertOk();
    });

    it('can create a project with valid data', function () {
        $this->actingAs($this->user);

        $newProject = Project::factory()->make();

        Livewire::test(CreateProject::class)
            ->fillForm([
                'title' => $newProject->title,
                'description' => $newProject->description,
                'is_active' => (int) $newProject->is_active,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('projects', [
            'title' => $newProject->title,
        ]);
    });

    it('validates required fields', function (array $data, array $errors) {
        $this->actingAs($this->user);

        Livewire::test(CreateProject::class)
            ->fillForm($data)
            ->call('create')
            ->assertHasFormErrors($errors);
    })->with([
        'title is required' => [['title' => null, 'description' => '<p>Test</p>'], ['title' => 'required']],
        'description is required' => [['title' => 'Test', 'description' => ''], ['description' => 'required']],
    ]);
});

describe('edit page', function () {
    it('can render the edit page', function () {
        $this->actingAs($this->user);
        $project = Project::factory()->create();

        Livewire::test(EditProject::class, ['record' => $project->id])
            ->assertOk();
    });

    it('can update a project', function () {
        $this->actingAs($this->user);
        $project = Project::factory()->create();

        Livewire::test(EditProject::class, ['record' => $project->id])
            ->fillForm([
                'title' => 'Updated Title',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Title',
        ]);
    });
});

describe('soft deletes', function () {
    it('can soft delete a project', function () {
        $this->actingAs($this->user);
        $project = Project::factory()->create();

        Livewire::test(EditProject::class, ['record' => $project->id])
            ->callAction('delete');

        $this->assertSoftDeleted('projects', [
            'id' => $project->id,
        ]);
    });

    it('can restore a soft-deleted project', function () {
        $this->actingAs($this->user);
        $project = Project::factory()->create();
        $project->delete();

        Livewire::test(EditProject::class, ['record' => $project->id])
            ->callAction('restore');

        $this->assertNotSoftDeleted('projects', [
            'id' => $project->id,
        ]);
    });
});
