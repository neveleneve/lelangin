<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DaftarPenawaran extends Component
{
    public function render()
    {
        return view('livewire.daftar-penawaran')
            ->extends('layouts.livewire');
    }
}
