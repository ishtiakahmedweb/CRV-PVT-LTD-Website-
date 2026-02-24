<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('General')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('app_name')
                            ->required(),
                        \Filament\Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->maxSize(5120)
                            ->helperText('Recommended: 400×120 px | Best Format: Transparent PNG | Max: 5MB'),
                        \Filament\Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->maxSize(1024)
                            ->helperText('Recommended: 64×64 px | Max: 1MB'),
                        \Filament\Forms\Components\Textarea::make('footer_text')
                            ->columnSpanFull(),
                    ]),
                \Filament\Schemas\Components\Section::make('Header Menu')
                    ->description('Add menu items as Name and URL (e.g. Home => #hero)')
                    ->schema([
                        \Filament\Forms\Components\KeyValue::make('header_menu')
                            ->keyLabel('Menu Name')
                            ->valueLabel('URL / Link')
                            ->addActionLabel('Add Menu Item'),
                    ]),
                \Filament\Schemas\Components\Section::make('Theme Colors')
                    ->schema([
                        \Filament\Forms\Components\ColorPicker::make('primary_color'),
                        \Filament\Forms\Components\ColorPicker::make('secondary_color'),
                        \Filament\Forms\Components\ColorPicker::make('bg_color'),
                        \Filament\Forms\Components\ColorPicker::make('text_color'),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make('Contact Info')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('contact_email')
                            ->email(),
                        \Filament\Forms\Components\TextInput::make('contact_phone'),
                        \Filament\Forms\Components\TextInput::make('whatsapp_number'),
                        \Filament\Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make('Social Links')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('facebook_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('instagram_url')
                            ->url(),
                        \Filament\Forms\Components\TextInput::make('linkedin_url')
                            ->url(),
                    ])->columns(3),
                \Filament\Schemas\Components\Section::make('Maps & Integration')
                    ->schema([
                        \Filament\Forms\Components\Textarea::make('google_maps_embed')
                            ->label('Google Maps Embed Code')
                            ->helperText('Paste the <iframe> code from Google Maps share.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
