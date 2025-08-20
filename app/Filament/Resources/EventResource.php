<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Event & Pendaftaran';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Event';
    protected static ?string $pluralModelLabel = 'Daftar Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Section::make([
                            Forms\Components\TextInput::make('title')
                                ->label('Judul Event')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('location')
                                ->label('Lokasi')
                                ->maxLength(255),
                            Forms\Components\DateTimePicker::make('start_date')
                                ->label('Tanggal Mulai')
                                ->required(),
                            Forms\Components\DateTimePicker::make('end_date')
                                ->label('Tanggal Selesai'),
                        ]),
                        Forms\Components\Section::make([
                            Forms\Components\FileUpload::make('banner')
                                ->label('Banner')
                                ->image()
                                ->disk('public')
                                ->directory('event-banners')
                                ->maxSize(2048),
                            Forms\Components\Textarea::make('description')
                                ->label('Deskripsi Event')
                                ->rows(6),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner')
                    ->label('Banner')
                    ->circular()
                    ->size(48),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Event')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}