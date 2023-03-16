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

        $this->updateLastActive();
    }

    public function callSnap($idlot, $iduser)
    {
        $datalot = BidLot::find($idlot);
        $params = [
            'transaction_details' => [
                'order_id' => 'Bid-Join-' . $datalot->kode_lot . '-' . rand(100000000, 999999999),
                'gross_amount' => 50000,
            ],
            'customer_details' => [
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ],
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
}
