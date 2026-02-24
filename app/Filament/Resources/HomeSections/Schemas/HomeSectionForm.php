<?php

namespace App\Filament\Resources\HomeSections\Schemas;

use Filament\Schemas\Schema;
use App\Models\HomeSection;

class HomeSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'hero' => 'Hero',
                        'about' => 'About',
                        'features' => 'Why Choose Us',
                        'contact' => 'Contact Section',
                    ])
                    ->required()
                    ->unique(HomeSection::class, 'type', ignoreRecord: true),
                \Filament\Forms\Components\TextInput::make('title'),
                \Filament\Forms\Components\TextInput::make('subtitle'),
                \Filament\Forms\Components\RichEditor::make('content'),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('homepage')
                    ->maxSize(10240)
                    ->helperText('Recommended: 1920×1080 (Hero) or 1000×1200 (About) | Max: 10MB'),
                \Filament\Forms\Components\TextInput::make('cta_text'),
                \Filament\Forms\Components\TextInput::make('cta_link'),
                \Filament\Forms\Components\Toggle::make('is_visible')
                    ->default(true),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
