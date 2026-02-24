<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
