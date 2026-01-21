<?php

namespace App\Filament\Resources\Messages\Pages;

use App\Enums\MessageStatus;
use App\Filament\Resources\Messages\MessageResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewMessage extends ViewRecord
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('markAsSeen')
                ->label('Mark as Seen')
                ->icon(Heroicon::OutlinedEye)
                ->color('warning')
                ->visible(fn (): bool => $this->record->status === MessageStatus::Unread)
                ->action(function (): void {
                    $this->record->update(['status' => MessageStatus::Seen]);
                    Notification::make()
                        ->title('Message marked as seen')
                        ->success()
                        ->send();
                }),
            Action::make('markAsContacted')
                ->label('Mark as Contacted')
                ->icon(Heroicon::OutlinedCheckCircle)
                ->color('success')
                ->visible(fn (): bool => in_array($this->record->status, [MessageStatus::Unread, MessageStatus::Seen]))
                ->action(function (): void {
                    $this->record->update(['status' => MessageStatus::Contacted]);
                    Notification::make()
                        ->title('Message marked as contacted')
                        ->success()
                        ->send();
                }),
            Action::make('resetToUnread')
                ->label('Reset to Unread')
                ->icon(Heroicon::OutlinedArrowUturnLeft)
                ->color('gray')
                ->visible(fn (): bool => $this->record->status !== MessageStatus::Unread)
                ->requiresConfirmation()
                ->modalHeading('Reset to Unread')
                ->modalDescription('Are you sure you want to reset this message to unread?')
                ->action(function (): void {
                    $this->record->update(['status' => MessageStatus::Unread]);
                    Notification::make()
                        ->title('Message reset to unread')
                        ->success()
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }
}
