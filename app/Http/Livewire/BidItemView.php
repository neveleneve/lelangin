<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BidItemView extends Component
{
    public function render()
    {
        return view('livewire.bid-item-view')->extends('layouts.livewire');
    }
}
