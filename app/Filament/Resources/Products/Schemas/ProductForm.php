<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use App\Models\Product;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Product::class, 'slug', ignoreRecord: true),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->helperText('Recommended: 800×800 px (Square) | Best Format: Transparent PNG'),
                \Filament\Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\KeyValue::make('specifications')
                    ->addActionLabel('Add specification')
                    ->keyLabel('Property')
                    ->valueLabel('Value'),
                \Filament\Forms\Components\Toggle::make('is_featured')
                    ->default(false),
                \Filament\Forms\Components\Toggle::make('is_visible')
                    ->default(true),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
