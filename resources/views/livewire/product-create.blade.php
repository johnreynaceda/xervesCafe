<div>
    <h1 class="font-medium underline text-xl">Add {{ $manage->category }}</h1>
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
                <input wire:model="isavailable" type="checkbox" value="1" class="form-checkbox">
                <span class="ml-2">Is Available</span>
              </label>
           </div>
            <div wire:click="saveProduct" class="bg-green-600 mt-2 p-1 px-3 w-20 flex cursor-pointer rounded-md ml-14  hover:bg-green-700 justify-center">
                <h1 class="font-medium text-white ">SAVE</h1>
            </div>
            </div>
           <div class=" w-6/12">
            <div class="mb-2 text-gray-600">
                <label for="">Image:</label>
                @if ($photo)
               <div class="border border-side h-64 rounded-sm shadow-lg mb-1">
                <img src="{{ $photo->temporaryUrl() }}" class="h-64 w-full">
               </div>
               @else
               <div class="border flex relative h-64 shadow-lg rounded-sm mb-1"></div>
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