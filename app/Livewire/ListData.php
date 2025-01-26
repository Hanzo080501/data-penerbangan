<?php

namespace App\Livewire;

use App\Models\FlightData;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class ListData extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;
    public function render()
    {
        return view('livewire.list-data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(FlightData::query())
            ->columns([
                TextColumn::make('serial_number')
                    ->label('Serial Number')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('registration')
                    ->label('Registration')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('flight_hours')
                    ->label('Flight Hours')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('flight_cycles')
                    ->label('Flight Cycles')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('time_since_new')
                    ->label('Time Since New')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cycle_since_new')
                    ->label('Cycle Since New')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('serial_number')
                    ->label('Serial Number')
                    ->options(FlightData::all()->pluck('serial_number', 'serial_number')),
                SelectFilter::make('registration')
                    ->label('Registration')
                    ->options(FlightData::all()->pluck('registration', 'registration')),
            ])
            ->actions([
                EditAction::make()
                    ->slideOver()
                    ->model(FlightData::class)
                    ->label('Edit')
                    ->form([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('serial_number'),
                                TextInput::make('registration'),
                                TextInput::make('flight_hours'),
                                TextInput::make('flight_cycles'),
                                TextInput::make('time_since_new'),
                                TextInput::make('cycle_since_new'),
                            ]),
                    ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
