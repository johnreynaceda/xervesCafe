<div>
    <h1 class="font-medium underline text-xl">Update {{ $manage->category }}</h1>
    <form action="">
       <div class="flex">
           <div class=" w-6/12">
           <div class="mb-2">
            <label for="">{{ $manage->category }} name:</label>
            <input wire:model="product_name" type="text" class="h-10 border border-gray-500 focus:outline-none rounded-md px-2 focus:border-side" placeholder="Enter a name">
           </div>
           <div class="mb-2">
            <label for="">Amount:</label>
            <input wire:model="amount" type="text" class="h-10 border border-gray-500 focus:outline-none rounded-md px-2 focus:border-side" placeholder="&#8369;0.00">
           </div>
           <div class="mb-2">
            <label class="inline-flex items-center">
                <input wire:model="isavailable" type="checkbox" value="1" {{ $this->isavailable==1 ? 'checked' : '' }} class="form-checkbox ">
                <span class="ml-2">Is Available</span>
              </label>
           </div>
           <div class="flex">
            <div wire:click="saveeditProduct" class="bg-green-600 mt-2 p-1 px-3 w-20 flex cursor-pointer rounded-md ml-14  hover:bg-green-700 justify-center">
                <h1 class="font-medium text-white ">SAVE</h1>
            </div>
            <div wire:click="canceleditProduct" class="bg-red-600 mt-2 p-1 px-3 w-20 flex cursor-pointer rounded-md ml-2  hover:bg-red-700 justify-center">
                <h1 class="font-medium text-white ">CANCEL</h1>
            </div>
           </div>
            </div>
           <div class=" w-6/12">
            <div class="mb-2 text-gray-600">
                <label for="">Image:</label>
                @if ($photo==null)
                @if ($lastphoto)
               <div class="border border-side h-64 rounded-sm shadow-lg mb-1">
                   
                <img src="{{ asset('/storage/products/' . $lastphoto) }}" class="h-64 w-full">
               </div>
               @else
               <div class="border flex relative h-64 shadow-lg rounded-sm mb-1"></div>
            @endif
                @else
            @if ($photo)
               <div class="border border-side h-64 rounded-sm shadow-lg mb-1">
                   
                <img src="{{ $photo->temporaryUrl() }}" class="h-64 w-full">
               </div>
               @else
               <div class="border flex relative h-64 shadow-lg rounded-sm mb-1"></div>
            @endif
                @endif

            <div class="relative">
                <input type="file" wire:model="photo">
            </div>

            @error('photo') <span class="text-red-700 text-sm error">{{ $message }}</span> @enderror

            </div>
        </div>
       </div>
    </form>
</div>