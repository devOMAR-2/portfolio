<?php

namespace App\Filament\Resources\Messages\Tables;

use App\Enums\MessageStatus;
use App\Models\Message;
use CodeWithKyrian\FilamentDateRange\Tables\Filters\DateRangeFilter;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class MessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->sortable()
                    ->badge(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon(Heroicon::OutlinedEnvelope),
                TextColumn::make('company')
                    ->searchable()
                    ->placeholder('N/A')
                    ->toggleable(),
                TextColumn::make('phone')
                    ->copyable()
                    ->icon(Heroicon::OutlinedPhone),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('l M d, Y - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                DateRangeFilter::make('created_at')
                    ->firstDayOfWeek(7)
                    ->dualCalendar(false)
                    ->label('Received within'),
                SelectFilter::make('status')
                    ->options(MessageStatus::class)
                    ->native(false)
                    ->multiple(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    Action::make('markAsSeen')
                        ->label('Mark as Seen')
                        ->icon(Heroicon::OutlinedEye)
                        ->color('warning')
                        ->visible(fn (Message $record): bool => $record->status === MessageStatus::Unread)
                        ->action(function (Message $record): void {
                            $record->update(['status' => MessageStatus::Seen]);
                            Notification::make()
                                ->title('Message marked as seen')
                                ->success()
                                ->send();
                        }),
                    Action::make('markAsContacted')
                        ->label('Mark as Contacted')
                        ->icon(Heroicon::OutlinedCheckCircle)
                        ->color('success')
                        ->visible(fn (Message $record): bool => in_array($record->status, [MessageStatus::Unread, MessageStatus::Seen]))
                        ->action(function (Message $record): void {
                            $record->update(['status' => MessageStatus::Contacted]);
                            Notification::make()
                                ->title('Message marked as contacted')
                                ->success()
                                ->send();
                        }),
                    Action::make('resetToUnread')
                        ->label('Reset to Unread')
                        ->icon(Heroicon::OutlinedArrowUturnLeft)
                        ->color('gray')
                        ->visible(fn (Message $record): bool => $record->status !== MessageStatus::Unread)
                        ->requiresConfirmation()
                        ->modalHeading('Reset to Unread')
                        ->modalDescription('Are you sure you want to reset this message to unread?')
                        ->action(function (Message $record): void {
                            $record->update(['status' => MessageStatus::Unread]);
                            Notification::make()
                                ->title('Message reset to unread')
                                ->success()
                                ->send();
                        }),
                    DeleteAction::make(),
                ])
                    ->icon(Heroicon::OutlinedEllipsisVertical),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('markSelectedAsSeen')
                        ->label('Mark as Seen')
                        ->icon(Heroicon::OutlinedEye)
                        ->color('warning')
                        ->action(function (Collection $records): void {
                            $records->each(fn (Message $record) => $record->update(['status' => MessageStatus::Seen]));
                            Notification::make()
                                ->title('Messages marked as seen')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('markSelectedAsContacted')
                        ->label('Mark as Contacted')
                        ->icon(Heroicon::OutlinedCheckCircle)
                        ->color('success')
                        ->action(function (Collection $records): void {
                            $records->each(fn (Message $record) => $record->update(['status' => MessageStatus::Contacted]));
                            Notification::make()
                                ->title('Messages marked as contacted')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('resetSelectedToUnread')
                        ->label('Reset to Unread')
                        ->icon(Heroicon::OutlinedArrowUturnLeft)
                        ->color('gray')
                        ->action(function (Collection $records): void {
                            $records->each(fn (Message $record) => $record->update(['status' => MessageStatus::Unread]));
                            Notification::make()
                                ->title('Messages reset to unread')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
