<?php

use App\Enums\MessageStatus;
use App\Filament\Resources\Messages\MessageResource;
use App\Filament\Resources\Messages\Pages\ListMessages;
use App\Filament\Resources\Messages\Pages\ViewMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->admin()->create();
});

describe('authorization', function () {
    it('guest cannot access messages list page', function () {
        $this->get(MessageResource::getUrl('index'))
            ->assertRedirect('/admin/login');
    });

    it('authenticated user can access messages list page', function () {
        $this->actingAs($this->user)
            ->get(MessageResource::getUrl('index'))
            ->assertOk();
    });
});

describe('list page', function () {
    it('can render the list page', function () {
        $this->actingAs($this->user);

        Livewire::test(ListMessages::class)
            ->assertOk();
    });

    it('can list messages', function () {
        $this->actingAs($this->user);
        $messages = Message::factory()->count(3)->create();

        Livewire::test(ListMessages::class)
            ->assertCanSeeTableRecords($messages);
    });

    it('can filter messages by status', function () {
        $this->actingAs($this->user);

        $unreadMessage = Message::factory()->create(['status' => MessageStatus::Unread]);
        $seenMessage = Message::factory()->create(['status' => MessageStatus::Seen]);
        $contactedMessage = Message::factory()->create(['status' => MessageStatus::Contacted]);

        Livewire::test(ListMessages::class)
            ->filterTable('status', [MessageStatus::Unread->value])
            ->assertCanSeeTableRecords([$unreadMessage])
            ->assertCanNotSeeTableRecords([$seenMessage, $contactedMessage]);
    });

    it('displays status column as badge', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create(['status' => MessageStatus::Unread]);

        Livewire::test(ListMessages::class)
            ->assertTableColumnExists('status');
    });
});

describe('navigation badge', function () {
    it('shows unread count in navigation', function () {
        Message::factory()->count(3)->create(['status' => MessageStatus::Unread]);
        Message::factory()->count(2)->create(['status' => MessageStatus::Seen]);

        expect(MessageResource::getNavigationBadge())->toBe('3');
    });

    it('returns null when no unread messages', function () {
        Message::factory()->count(2)->create(['status' => MessageStatus::Contacted]);

        expect(MessageResource::getNavigationBadge())->toBeNull();
    });
});

describe('status actions', function () {
    it('mark as seen action sets status to seen', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create(['status' => MessageStatus::Unread]);

        Livewire::test(ListMessages::class)
            ->callTableAction('markAsSeen', $message);

        expect($message->fresh()->status)->toBe(MessageStatus::Seen);
    });

    it('mark as seen action is only visible when status is unread', function () {
        $this->actingAs($this->user);

        $unreadMessage = Message::factory()->create(['status' => MessageStatus::Unread]);
        $seenMessage = Message::factory()->create(['status' => MessageStatus::Seen]);

        Livewire::test(ListMessages::class)
            ->assertTableActionVisible('markAsSeen', $unreadMessage)
            ->assertTableActionHidden('markAsSeen', $seenMessage);
    });

    it('mark as contacted action sets status to contacted', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create(['status' => MessageStatus::Unread]);

        Livewire::test(ListMessages::class)
            ->callTableAction('markAsContacted', $message);

        expect($message->fresh()->status)->toBe(MessageStatus::Contacted);
    });

    it('mark as contacted action is visible for unread and seen messages', function () {
        $this->actingAs($this->user);

        $unreadMessage = Message::factory()->create(['status' => MessageStatus::Unread]);
        $seenMessage = Message::factory()->create(['status' => MessageStatus::Seen]);
        $contactedMessage = Message::factory()->create(['status' => MessageStatus::Contacted]);

        Livewire::test(ListMessages::class)
            ->assertTableActionVisible('markAsContacted', $unreadMessage)
            ->assertTableActionVisible('markAsContacted', $seenMessage)
            ->assertTableActionHidden('markAsContacted', $contactedMessage);
    });

    it('reset to unread action sets status to unread', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create(['status' => MessageStatus::Contacted]);

        Livewire::test(ListMessages::class)
            ->callTableAction('resetToUnread', $message);

        expect($message->fresh()->status)->toBe(MessageStatus::Unread);
    });

    it('reset to unread action is hidden when status is unread', function () {
        $this->actingAs($this->user);

        $unreadMessage = Message::factory()->create(['status' => MessageStatus::Unread]);
        $seenMessage = Message::factory()->create(['status' => MessageStatus::Seen]);

        Livewire::test(ListMessages::class)
            ->assertTableActionHidden('resetToUnread', $unreadMessage)
            ->assertTableActionVisible('resetToUnread', $seenMessage);
    });
});

describe('bulk actions', function () {
    it('can bulk update messages to seen', function () {
        $this->actingAs($this->user);

        $messages = Message::factory()->count(3)->create(['status' => MessageStatus::Unread]);

        Livewire::test(ListMessages::class)
            ->callTableBulkAction('markSelectedAsSeen', $messages);

        foreach ($messages as $message) {
            expect($message->fresh()->status)->toBe(MessageStatus::Seen);
        }
    });

    it('can bulk update messages to contacted', function () {
        $this->actingAs($this->user);

        $messages = Message::factory()->count(3)->create(['status' => MessageStatus::Unread]);

        Livewire::test(ListMessages::class)
            ->callTableBulkAction('markSelectedAsContacted', $messages);

        foreach ($messages as $message) {
            expect($message->fresh()->status)->toBe(MessageStatus::Contacted);
        }
    });
});

describe('view page', function () {
    it('can render the view page', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create();

        Livewire::test(ViewMessage::class, ['record' => $message->id])
            ->assertOk();
    });

    it('view page actions change status correctly', function () {
        $this->actingAs($this->user);
        $message = Message::factory()->create(['status' => MessageStatus::Unread]);

        Livewire::test(ViewMessage::class, ['record' => $message->id])
            ->callAction('markAsSeen');

        expect($message->fresh()->status)->toBe(MessageStatus::Seen);
    });
});

describe('read-only resource', function () {
    it('cannot create messages from admin', function () {
        expect(MessageResource::canCreate())->toBeFalse();
    });
});
