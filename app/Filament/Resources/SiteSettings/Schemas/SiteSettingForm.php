<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Section::make('General')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('app_name')
                            ->required(),
                        \Filament\Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->directory('settings'),
                        \Filament\Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->directory('settings'),
                    ]),
                \Filament\Forms\Components\Section::make('Theme Colors')
                    ->schema([
                        \Filament\Forms\Components\ColorPicker::make('primary_color'),
                        \Filament\Forms\Components\ColorPicker::make('secondary_color'),
                        \Filament\Forms\Components\ColorPicker::make('bg_color'),
                        \Filament\Forms\Components\ColorPicker::make('text_color'),
                    ])->columns(2),
                \Filament\Forms\Components\Section::make('Contact Info')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('contact_email')
                            ->email(),
                        \Filament\Forms\Components\TextInput::make('contact_phone'),
                        \Filament\Forms\Components\TextInput::make('whatsapp_number'),
                        \Filament\Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),
                \Filament\Forms\Components\Section::make('Social Links')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('facebook_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('instagram_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('linkedin_url')
                            ->url(),
                    ])->columns(3),
            ]);
    }
}
