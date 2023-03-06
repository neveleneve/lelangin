<?php

namespace App\Http\Livewire;

use App\Models\BidLot;
use Livewire\Component;
use App\Traits\UserUtilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingPageDua extends Component
{
    use UserUtilities;
    public $lastactive = null;
    public $newestbid = [];
    public $timeoutbid = [];

    public function render()
    {
        return view('livewire.landing-page-dua')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->newestbid = BidLot::with(['items'])
            ->where('waktu_mulai', '<=', strtotime(date('Y-m-d H:i:s')))
            ->where('waktu_selesai', '>', strtotime(date('Y-m-d H:i:s')))
            ->orderBy('waktu_mulai', 'ASC')
            ->take(4)
            ->get();

        $this->timeoutbid = BidLot::with(['items'])
            ->where('waktu_mulai', '<=', strtotime(date('Y-m-d H:i:s')))
            ->where('waktu_selesai', '>', strtotime(date('Y-m-d H:i:s')))
            ->orderBy('waktu_selesai', 'ASC')
            ->take(4)
            ->get();

        $this->updateLastActive();
        $this->lastactive = $this->checkLastActive();
    }
}
