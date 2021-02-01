<div>
    <div class="content flex  space-x-3">
        <div class="bg-white h-screen shadow-lg w-7/12">
            <div class="bg-gray-300 h-12 flex items-center space-x-2 px-2 shadow-md">
               <div class="flex w-full">
                   <div class=" w-10/12 flex items-center">
                    <div class="flex">
                        <i class="material-icons">drag_indicator</i>
                    </div>
                    @forelse ($categories as $category)
                    <div wire:click="$set('tab', {{ $category->id }})"
                    class="flex  space-x-1 hover:bg-gray-500 hover:text-white cursor-pointer rounded-md p-1 {{$tab== $category->id ? 'bg-gray-500 text-white' : ''}}">
                    <i class="material-icons">flag</i>
                    <h1 class="font-medium">{{ $category->category }}</h1>
                  
                </div>
                    @empty
                        
                    @endforelse
                    
                </div>
                   <div x-data="{ show: @entangle('manage_modal') }" class=" hover:bg-gray-500 text-gray-600 hover:text-white cursor-pointer rounded-full border border-gray-600 w-2/12 flex justify-center items-center ">
                    <div wire:click="manage" class="flex justify-center  items-center">
                        <i class="material-icons">apps</i>
                        <h1 class="font-medium">Manage</h1>
                    </div>
                    <div tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed" style="background-color: rgba(0,0,0,.5);" x-show="show">
                        <div class="text-left bg-white h-auto mx-96  mt-20" @click.away="show = true">
                            <div class="flex bg-nav text-gray-600">
                                <div class=" px-3 py-2 font-medium text-lg w-11/12">
                                 <h1>Manage Categories</h1>
                             </div>
                                <div class=" flex justify-center items-center w-1/12">
                                 <div @click="show = false" class=" hover:text-red-600 p-1 cursor-pointer  flex justify-center items-center"><i class="material-icons">close</i></div>
                             </div>
                            </div>
                            <div class="body bg-white text-gray-600 p-2 ">
                                <div class=" border border-side p-1">
                                    <h1 class="font-medium underline text-xl">Add Category</h1>
                                
                                <div class="bg-white mt-3">
                                   
                                    @if ($manage_updateMode)
                                    @include('livewire.manage-update')
                                    @else
                                    @include('livewire.manage-create')
                                    @endif
                                </div>
                                </div>
                                <div class=" border border-side p-1">
                                    <table class="text-left    w-full  ">
                                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                                        <thead class="bg-gray-600 text-white ">
                                            <tr class="">
                                                <th width="10" class="py-2 px-2 b font-bold uppercase text-xs border-b">#</th>
                                                <th width="250" class="py-2 px-2 b font-bold uppercase text-xs border-b">CATEGORY</th>
                                                <th width="100" class="py-2 px-2 b font-bold uppercase text-xs border-b">ACTION</th>
                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1?>
                                            @forelse ($categories as $category)
                                            <tr class="hover:bg-gray-100">
                                                <td class="py-2 px-2 border-b border-gray-600">{{ $i++ }}</td>
                                                <td class="py-2 px-2 border-b border-gray-600">{{ $category->category }}</td>
                                                
                                                <td class="py-2 px-2 border-b border-gray-600 text-center">
                                                   <div class="flex space-x-3">
                                                    <div wire:click="manage_edit({{ $category->id }})" class=" cursor-pointer hover:bg-print hover:text-white rounded-sm text-gray-600 px-2 flex justify-center items-center w-6">
                                                        <i class="material-icons">edit</i>
                                                    </div>
                                                    <div wire:click="manage_delete({{  $category->id  }})" class=" cursor-pointer hover:bg-red-600 hover:text-white rounded-sm text-gray-600 px-2 flex justify-center items-center w-6">
                                                        <i class="material-icons">delete</i>
                                                    </div>
                                                   </div>
                                                </td>
                                            </tr> 
                                            @empty
                                                <td class="py-2 px-2 border-b border-gray-600" colspan="3">No Category Data!</td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>


                               </div>
                           </div>
                        </div>
                    </div>
               </div>
    
            </div>
            <div class=" p-2 py-3 h-full overflow-y-auto">
                <div class=" mb-2">
                    
                    <div x-data="{ show: @entangle('product_modal') }"  class="flex">
                        <div wire:click="product" class=" bg-side flex cursor-pointer px-2 py-2 hover:bg-yellow-500 hover:text-gray-900 rounded-sm shadow-md text-white space-x-1 ">
                            <i class="material-icons">add_box</i>
                            <h1>Manage {{ $manage->category }}</h1>
                        </div>
                        <div tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed" style="background-color: rgba(0,0,0,.5);" x-show="show">
                            <div class="text-left bg-white h-auto mx-96  mt-6" @click.away="show = true">
                                <div class="flex bg-nav text-gray-600">
                                    <div class=" px-3 py-2 font-medium text-lg w-11/12">
                                     <h1>Manage {{ $manage->category }}</h1>
                                 </div>
                                    <div class=" flex justify-center items-center w-1/12">
                                     <div @click="show = false" class=" hover:text-red-600 p-1 cursor-pointer  flex justify-center items-center"><i class="material-icons">close</i></div>
                                 </div>
                                </div>
                                <div class="body bg-white text-gray-600 p-2 ">
                                    <div class=" border border-side p-1">
                                        
                                    
                                    <div class="bg-white mt-3">
                                       
                                        @if ($manage_updateMode)
                                        @include('livewire.product-update')
                                        @else
                                        @include('livewire.product-create')
                                        @endif
                                    </div>
                                    </div>
                                    <div class=" border border-side h-40 overflow-y-auto p-1">
                                        <table class="text-left w-full   ">
                                            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                                            <thead class="bg-gray-600 text-white ">
                                                <tr class="">
                                                    <th width="10" class="py-2 px-2 b font-bold uppercase text-xs border-b">#</th>
                                                    <th width="250" class="py-2 px-2 b font-bold uppercase text-xs border-b">{{ $manage->category }}</th>
                                                    <th width="250" class="py-2 px-2 b font-bold uppercase text-xs border-b">AMOUNT</th>
                                                    <th width="100" class="py-2 px-2 b font-bold uppercase text-xs border-b">ACTION</th>
                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1?>
                                                @forelse ($products as $product)
                                                <tr class="hover:bg-gray-100">
                                                    <td class="py-2 px-2 border-b border-gray-600">{{ $i++ }}</td>
                                                    <td class="py-2 px-2 border-b border-gray-600">{{ $product->name }}</td>
                                                    <td class="py-2 px-2 border-b border-gray-600">&#8369;{{ $product->amount }}</td>
                                                    
                                                    <td class="py-2 px-2 border-b border-gray-600 text-center">
                                                       <div class="flex space-x-3">
                                                        <div wire:click="product_edit({{ $product->id }})" class=" cursor-pointer hover:bg-print hover:text-white rounded-sm text-gray-600 px-2 flex justify-center items-center w-6">
                                                            <i class="material-icons">edit</i>
                                                        </div>
                                                        <div wire:click="product_delete({{  $product->id  }})" class=" cursor-pointer hover:bg-red-600 hover:text-white rounded-sm text-gray-600 px-2 flex justify-center items-center w-6">
                                                            <i class="material-icons">delete</i>
                                                        </div>
                                                       </div>
                                                    </td>
                                                </tr> 
                                                @empty
                                                    <td class="py-2 px-2 border-b border-gray-600" colspan="4">No  Data!</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
    
    
                                   </div>
                               </div>
                            </div>
                    </div>
                </div>
                <div class="grid grid-cols-5 mb-24 gap-1">
                    @forelse ($products as $product)
                    <div wire:click="addTransaction({{ $product->id }})" class="relative bg-white h-36 shadow-md rounded-md cursor-pointer mb-2 w-36 transform transition duration-200 hover:-translate-y-1 hover:scale-100">
                        <img src="{{ asset('/storage/products/' . $product->image->url) }}"
                            class="  rounded-md top-0 object-cover inset-0 z-0 right-0 w-full h-full absolute " alt="">
                        <div
                            class="bg-black opacity-50 rounded-bl-md rounded-br-md text-white text-center absolute w-full bottom-0">
                            <div class="relative">
                                <h1>{{ $product->name }}</h1>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h1>No data!</h1>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="h-screen border-l  w-5/12">
            <div class="bg-gray-600 h-12 flex text-white items-center space-x-2 px-2 shadow-md">
                <div class="flex">
                    <i class="material-icons">drag_indicator</i>
                </div>
                <div class="flex text-white space-x-1 hover:bg-gray-500 hover:text-white cursor-pointer rounded-md p-1">
                    <i class="material-icons">point_of_sale</i>
                    <h1 class="font-medium">TRANSACTION</h1>
                </div>
                <div class="flex text-white ml-2 border-l-2 border-side space-x-1  p-1">
                    <h1 class="font-medium">{{ $code }}</h1>
                </div>
               
    
    
            </div>
            <div class=" mt-5 h-72">
                <table class="text-left  border    ">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead class="bg-gray-600 text-white ">
                        <tr class="">
                            <th width="10" class="py-2 px-2 b font-bold uppercase text-xs border-b">#</th>
                            <th width="250" class="py-2 px-2 b font-bold uppercase text-xs border-b">ITEM</th>
                            <th width="100" class="py-2 px-2 b font-bold uppercase text-xs border-b">QTY</th>
                            <th width="100" class="py-2 px-2 b font-bold uppercase text-xs border-b">AMOUNT</th>
                            <th width="100" class="py-2 px-2 b font-bold uppercase text-xs border-b">ACTION</th>
    
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i=1 ?>
                     <?php $subtotal = 0; ?>
                      @forelse ($transactions as $trans)
                      <tr class="hover:bg-gray-100">
                        <td class="py-2 px-2 border-b border-gray-600">{{ $i++ }}</td>
                       @foreach ($trans->products as $item)
                       <td class="py-2 px-2 border-b border-gray-600">{{ $item->name }}</td>
                       <td class="py-2 px-2 border-b border-gray-600">{{ $trans->quantity }} item</td>
                       <td class="py-2 px-2 border-b border-gray-600">&#8369; {{ number_format($item->amount,2) }}</td>
                       <span class="hidden">{{ $subtotal += $item->amount * $trans->quantity }}</span>
                       @endforeach
                        <td class="py-2 px-2 border-b border-gray-600 text-center">
                            <div wire:click="deleteTransaction({{ $trans->id }})" class=" cursor-pointer hover:bg-red-600 hover:text-white rounded-sm text-gray-600 px-2 flex justify-center items-center w-6">
                                <i class="material-icons">delete</i>
                            </div>
                        </td>
                    </tr>
                      @empty
                          <td colspan="5" class="text-center">No transaction!</td>
                      @endforelse
                        
    
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-600 h-12 flex justify-center items-center">
                <h1 class="text-3xl text-white font-medium">&#8369;{{number_format($subtotal, 2)}}</h1>
            </div>
            <div class="bg-gray-600 mt-5 flex h-full p-2">
               <div class="bg-white w-6/12 p-2">
                <div class="flex font-medium text-red-700 space-x-2">
                    <h1>Total: </h1>
                    <h1>&#8369;{{number_format($subtotal, 2)}} </h1>
                </div>
               
                <div class="cash mt-2">
                    <label for="">Your Cash</label>
                    <input wire:model="cash" type="number" class="border border-gray-600 shadow-md px-2 focus:outline-none focus:border-side h-10 w-full" placeholder="&#8369;0.00">
                </div>
            </div>
            <?php 
           
            $change = ((int)$cash) - $subtotal;
          ?>
               <div class="bg-white w-6/12 p-2">
                
                <div x-data="{ show: @entangle('transaction_modal') }" class="cash mt-14  flex">
                  <div wire:click="saveTrans" class="bg-green-600 p-2 px-4 text-white rounded-sm shadow-md hover:bg-green-700 cursor-pointer">Save</div>
                  <div tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed" style="background-color: rgba(0,0,0,.5);" x-show="show">
                    <div class="text-left bg-white h-auto mx-96  mt-32" @click.away="show = true">
                        <div class="flex bg-nav text-gray-600">
                            <div class=" px-3 py-2 font-medium text-lg w-11/12">
                             <h1>Change | {{ $code }}</h1>
                         </div>
                            <div class=" flex justify-center items-center w-1/12">
                             <div @click="show = false" class=" hover:text-red-600 p-1 cursor-pointer  flex justify-center items-center"><i class="material-icons">close</i></div>
                         </div>
                        </div>
                        <div class="body bg-white text-gray-600 p-2 ">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-6xl font-bold text-side underline">&#8369; {{number_format( $change,2) }}</h1>
                                
                                <div wire:click="saveSale({{ $subtotal }},{{ $change }})"  class="bg-green-600 mt-3 shadow-md cursor-pointer hover:bg-green-700 py-2 px-10 text-white font-medium">OK</div>
                            </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
              
            </div>
        </div>
    </div>
</div>
