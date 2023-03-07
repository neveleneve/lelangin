<?php

namespace App\Http\Livewire;

use App\Models\BidLot;
use App\Traits\AppUtilities;
use App\Traits\UserUtilities;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class BidItemView extends Component
{
    use UserUtilities;
    use AppUtilities;

    public $idlot, $kodelot, $datalelang, $bidusername, $startdate, $finishdate;

    public function render()
    {
        return view('livewire.bid-item-view')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->idlot = Crypt::decrypt(Route::current()
            ->parameter('id'));
        $this->kodelot = Route::current()
            ->parameter('kode');
        $this->datalelang = BidLot::with(['items', 'bids'])
            ->find($this->idlot);
        $this->bidusername = $this->getUsername($this->datalelang->items->user_id);
    }
}
