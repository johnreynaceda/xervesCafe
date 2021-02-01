<div>
    <form action="">
        <label for="">Category:</label>
        <input wire:model="category" type="text" class="h-10 border border-gray-500 focus:outline-none rounded-md px-2 focus:border-side">
        <div wire:click="saveCategory" class="bg-green-600 mt-2 p-1 px-3 w-20 flex rounded-md ml-24  hover:bg-green-700 justify-center">
            <h1 class="font-medium text-white ">SAVE</h1>
        </div>
    </form>
</div>