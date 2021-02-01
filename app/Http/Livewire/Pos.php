<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Catergory;
use App\Models\Product;
use App\Models\Image;
use App\Models\Sale;
use App\Models\Transaction;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Pos extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $manage_modal=false, $tab=1,$manage,$photo,$lastphoto,$newphoto,$product_modal=false,$product_name,$amount,$product_id,$isavailable;
    public $category,$category_id,$manage_updateMode=false,$qty=1,$code,$transaction_modal=false,$change,$cash;

    public function mount(){
        $trans = Sale::whereDate('created_at', Carbon::today())->count();
        $trans += 1;
        $this->code = Carbon::today()->format('Ymd');

        $this->code *= 1000;
        $this->code += $trans;
    }

    public function render()
    {
        
        $this->manage = Catergory::find($this->tab);
       
        return view('livewire.pos',[
            'categories' => Catergory::paginate(5),
            'products' => Product::where('category_id', $this->tab)->get(),
            'transactions' => Transaction::where('transaction_code',$this->code)->get(),
           
        ]);
    }

    public function manage(){
        $this->manage_modal=true;
    }
    public function saveCategory(){
       Catergory::create([
            'category' => $this->category,
       ]);

    $this->alert('success', 'Category Added Succesfully', [
        'position' =>  'center', 
        'timer' =>  2000,  
        'toast' =>  false, 
        'text' =>  '', 
        'confirmButtonText' =>  'Ok', 
        'cancelButtonText' =>  'Cancel', 
        'showCancelButton' =>  false, 
        'showConfirmButton' =>  false, 
  ]);
  $this->category="";
    }

    public function manage_edit($id){
    $this->manage_updateMode=true;
    $data = Catergory::find($id);
    $this->category = $data->category;
    $this->category_id = $data->id;

    }

    public function canceleditCategory(){
        $this->manage_updateMode=false;
        $this->category="";
    }
    public function saveeditCategory(){
       $data = Catergory::find($this->category_id);
       $data->update([
        'category' => $this->category,
       ]);
       $this->alert('success', 'Category Updated Succesfully!', [
        'position' =>  'center', 
        'timer' =>  2000,  
        'toast' =>  false, 
        'text' =>  '', 
        'confirmButtonText' =>  'Ok', 
        'cancelButtonText' =>  'Cancel', 
        'showCancelButton' =>  false, 
        'showConfirmButton' =>  false, 
        ]);
        $this->category="";
        $this->manage_updateMode=false;
       }

       public function manage_delete($id){
           Catergory::find($id)->delete();
           $this->alert('success', 'Category Deleted Succesfully!', [
            'position' =>  'center', 
            'timer' =>  2000,  
            'toast' =>  false, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
            ]);
       }

       public function product(){
           $this->product_modal=true;
       }

       public function saveProduct(){
        $filename = $this->photo->getClientOriginalName();
        $this->photo->storeAs('products',$filename,'public');

        $data = Product::create([
           'name' => $this->product_name,
           'amount' => $this->amount,
           'isavailable' => $this->isavailable,
           'category_id' => $this->manage->id,
        ]);
            Image::create([
                'url' => $filename,
                'imageable_id' => $data->id,
                'imageable_type' =>  Product::class,
            ]);
            $this->product_name="";
            $this->amount="";
            $this->isavailable="";
            $this->photo=null;

            $this->alert('success', 'Product Added Succesfully!', [
                'position' =>  'center', 
                'timer' =>  2000,  
                'toast' =>  false, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]);
       }

       public function addTransaction($id){
        $tran = Transaction::where('transaction_code', $this->code)->where('product_id',$id)->first();
          $data = Product::find($id);
          if($tran){
            $tran->update(['quantity'=> $tran->quantity+=1]);
            $this->alert('success', 'Product Added', [
                'position' =>  'bottom-start', 
                'timer' =>  2000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]);  
        }else{
            Transaction::create([
                'product_id' => $data->id,
                'transaction_code' => $this->code,
                'quantity' => $this->qty,
            ]);
            $this->alert('success', 'Product Added', [
                'position' =>  'bottom-start', 
                'timer' =>  2000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]);  
       }
    }

    public function saveTrans(){
        if($this->cash == null){
            $this->alert('info', 'Please Input Cash', [
                'position' =>  'center', 
                'timer' =>  2000,  
                'toast' =>  false, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]);  
        }else{
            $this->transaction_modal=true;
        }
        }

        public function saveSale($total,$changes){
        
           Sale::create([
            'transaction_code' => $this->code,
            'total_amount' => $total,
            'customer_cash' => $this->cash,
            'change' => $changes,
           ]);
           $this->cash="";
           $trans = Sale::whereDate('created_at', Carbon::today())->count();
           $trans += 1;
           $this->code = Carbon::today()->format('Ymd');
   
           $this->code *= 1000;
           $this->code += $trans;
           
           $this->alert('success', 'Transacton Added Successfully', [
            'position' =>  'center', 
            'timer' =>  2000,  
            'toast' =>  false, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
            ]);  
            $this->transaction_modal=false;
        }


        public function deleteTransaction($id){
            Transaction::find($id)->delete();
            $this->alert('success', 'Product Deleted', [
                'position' =>  'top-end', 
                'timer' =>  2000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]); 
        }
       
        public function product_edit($id){
            $this->manage_updateMode=true;
            $data = Product::find($id);
            $this->product_name = $data->name;
            $this->amount = $data->amount;
            $this->isavailable = $data->isavailable;
            $this->product_id = $data->id;
            // dd($this->photo);
            $image = DB::table('images')->select('url')->where('imageable_id', $id)->get();
            foreach($image as $image_url){
                $this->lastphoto = $image_url->url; # Store editting image name
            }
            // dd($image);
        }

        public function canceleditProduct(){
            $this->product_name = "";
            $this->amount = "";
            $this->isavailable = null;
            $this->lastphoto = null;
            $this->photo = null;

            $this->manage_updateMode=false;
        }
        public function saveeditProduct(){
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('products',$filename,'public');
    
          $products = Product::find($this->product_id);
         $products->update([
            'name' => $this->product_name,
            'amount' => $this->amount,
            'isavailable' => $this->isavailable,
            'category_id' => $this->manage->id,
         ]);
         Image::create([
            'url' => $filename,
            'imageable_id' => $products->id,
            'imageable_type' =>  Product::class,
        ]);
        $imageUpdated = Image::where(['imageable_id' => $this->product_id, 'imageable_type' => Product::class])->update(['url' => $filename]);
        
        if($imageUpdated){
            Storage::delete('public/products/'.$this->lastphoto);
        }

        $this->alert('success', 'Product Updated Successfully', [
            'position' =>  'center', 
            'timer' =>  2000,  
            'toast' =>  false, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
            ]); 
            $this->product_name = "";
            $this->amount = "";
            $this->isavailable = null;
            $this->lastphoto = null;
            $this->photo = null;
            $this->manage_updateMode=false;


        }
        public function product_delete($id){
            $data = Product::find($id);
            $images = DB::table('images')->select('url')->where('imageable_id', $data->id)->get();
            foreach($images as $image_url){
                $this->lastphoto = $image_url->url; # Store editting image name 
            }
            Storage::delete('public/products/'.$this->lastphoto);
            $data->delete();
          
            $this->alert('success', 'Product Deleted Successfully', [
                'position' =>  'center', 
                'timer' =>  2000,  
                'toast' =>  false, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
                ]); 
        }



}
