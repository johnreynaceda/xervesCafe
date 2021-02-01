<div x-data="{ show: @entangle('sales_modal') }">
    <div wire:click="view" class=" border text-white border-white shadow-md cursor-pointer px-6 rounded-full text-xl hover:bg-white hover:text-gray-500 p-1">SALES</div>
    <div tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed" style="background-color: rgba(0,0,0,.5);" x-show="show">
        <div class="text-left bg-white h-auto mx-96  mt-32" @click.away="show = true">
            <div class="flex bg-nav text-gray-600">
                <div class=" px-3 py-2 font-medium text-lg w-11/12">
                 <h1>SALES | {{ \Carbon\Carbon::Today()->format('m-d-Y') }} </h1>
             </div>
                <div class=" flex justify-center items-center w-1/12">
                 <div @click="show = false" class=" hover:text-red-600 p-1 cursor-pointer  flex justify-center items-center"><i class="material-icons">close</i></div>
             </div>
            </div>
            <div class="body bg-white text-gray-600 p-2 ">
                <div class="sale">
                    <h1>Total Sales:</h1>
                    <div class="flex justify-center items-center">
                        <h1 class="text-6xl font-bold underline text-side">&#8369;{{number_format($this->sales,2)  }}</h1>
                    </div>
                    <div class="flex mt-4 justify-center items-center">
                       <a href="{{ route('report') }}">
                        <div class="bg-green-600 text-white cursor-pointer hover:bg-green-700 shadow-md p-2 px-12 font-medium ">PRINT REPORT</div>
                       </a>
                    </div>
                </div>
               </div>
           </div>
        </div>
</div>
