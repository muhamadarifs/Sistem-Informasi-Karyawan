<?php

namespace App\Http\Livewire;

use App\Models\User;
use LaravelViews\Views\TableView;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return ['No', 'Employe ID', 'NIK', 'Nama', 'Jabatan', 'Warga Negara', 'Tanggal Lahir', 'Jenis Kelamin', 'Email', 'No. HP', 'Alamat'];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [];
    }
}
