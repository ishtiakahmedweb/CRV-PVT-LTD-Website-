<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('role'),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('testimonials')
                    ->helperText('Recommended: 200×200 px (Square)'),
                \Filament\Forms\Components\Select::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ])
                    ->default(5)
                    ->required(),
                \Filament\Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_visible')
                    ->default(true),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
