<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserUtilities;
use Illuminate\Support\Facades\Auth;

class LandingPageDua extends Component
{
    use UserUtilities;
    public $lastactive = null;

    public function render()
    {
        return view('livewire.landing-page-dua')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->updateLastActive();
        $this->lastactive = $this->checkLastActive();
    }
}
