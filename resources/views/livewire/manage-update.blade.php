<div>
    <form action="">
        <label for="">Category:</label>
        <input wire:model="category" type="text" class="h-10 border border-gray-500 focus:outline-none rounded-md px-2 focus:border-side">
        <div class="flex">
            <div wire:click="saveeditCategory" class="bg-green-600 mt-2 p-1 px-3 w-20 flex rounded-md ml-24 mr-2 hover:bg-green-700 justify-center">
                <h1 class="font-medium text-white ">SAVE</h1>
            </div>
            <div wire:click="canceleditCategory" class="bg-red-600  mt-2 p-1 px-3 w-20 flex rounded-md   hover:bg-red-700 justify-center">
                <h1 class="font-medium text-white ">CANCEL</h1>
            </div>
        </div>
    </form>
</div>