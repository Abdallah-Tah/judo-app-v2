<?php

namespace App\Http\Livewire;

use App\Models\Club;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ClubsTable extends LivewireDatatable
{
    public $model = Club::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

                Column::name('name')
                ->label('Name')
                ->searchable()
                ->filterable(),
           
            DateColumn::name('created_at')
                ->label('Date'),

             Column::callback(['id', 'name'], function ($id, $name) {
                    return view('clubs.clubs-actions', ['id' => $id, 'name' => $name]);
                })->unsortable()
        ];
    }
}
