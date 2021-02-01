<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale as saleModel;
use Carbon\Carbon;
class Report extends Component
{
    public function render()
    {
        return view('livewire.report',[
            'sales' => saleModel::where('created_at','>=', Carbon::Today())->get(),
            'sale' => saleModel::where('created_at','>=', Carbon::Today())->get()->sum('total_amount'),
        ]);
    }
}
