<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(User::class, 'email', ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255),
            ]);
    }
}
