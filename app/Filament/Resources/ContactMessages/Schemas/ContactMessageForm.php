<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('phone')
                    ->disabled(),
                \Filament\Forms\Components\TextInput::make('subject')
                    ->disabled(),
                \Filament\Forms\Components\Textarea::make('message')
                    ->disabled()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'unread' => 'Unread',
                        'read' => 'Read',
                        'archived' => 'Archived',
                    ])
                    ->required(),
            ]);
    }
}
