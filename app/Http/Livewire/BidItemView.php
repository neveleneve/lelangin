<?php

namespace App\Http\Livewire;

use App\Models\BidLot;
use App\Models\BidLotJoin;
use App\Models\User;
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

    public $listeners = ['succeedPayment'];

    public $penawaranuser;

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
        if (count($this->datalelang->bids) != 0) {
            $this->penawaranuser = number_format($this->datalelang->bids[0]->penawaran, 0, ',', '.');
        } else {
            $this->penawaranuser = number_format($this->datalelang->harga_awal, 0, ',', '.');
        }
    }

    public function callSnap($idlot, $iduser)
    {
        $datauser = User::find($iduser);
        $params = [
            'transaction_details' => [
                'order_id' => 'Bid-Join-' . rand(100000000, 999999999),
                'gross_amount' => 50000,
            ],
            'customer_details' => [
                'first_name' => $datauser->name,
                'last_name' => $datauser->name,
                'email' => $datauser->email,
            ],
        ];
        $this->initPaymentGateway();
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $this->emit('snap', $snapToken, $idlot, $iduser);
    }

    public function inputPenawaran($idlot, $iduser)
    {
        # code...
    }

    public function succeedPayment($idlot, $iduser)
    {
        BidLotJoin::insert([
            'bid_lot_id' => $idlot,
            'user_penawar_id' => $iduser,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function incrementPenawaran()
    {
        $penawaranuser = str_replace('.', '', $this->penawaranuser);
        $penawaranuser += 10000;
        $this->penawaranuser = number_format($penawaranuser, 0, ',', '.');
    }

    public function decrementPenawaran($min)
    {
        $penawaranuser = str_replace('.', '', $this->penawaranuser);
        if ($penawaranuser > $min) {
            $penawaranuser -= 10000;
            $this->penawaranuser = number_format($penawaranuser, 0, ',', '.');
        }
    }
}
