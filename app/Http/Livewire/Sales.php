<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale as saleModel;
use Carbon\Carbon;

class Sales extends Component
{
    public $sales_modal=false,$sales;
    public function render()
    {
        $this->sales =  saleModel::where('created_at','>=', Carbon::Today())->get()->sum('total_amount');
       
        return view('livewire.sales');
    }

    public function view(){
        $this->sales_modal=true;
    }
}
