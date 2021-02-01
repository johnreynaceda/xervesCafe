<div class="relative bg-side h-16 ">
    <img src="{{ asset('images/background.jpg') }}"
        class=" opacity-10 top-0 object-cover inset-0 z-0 right-0 w-full h-full absolute " alt="">
    <div class="flex h-full relative">
       
        <div class="  w-5/12">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.jpg') }}" class="h-14 mt-1 ml-2 rounded-full" alt="">
                <h1 class="text-3xl ml-3 font-bold text-white">Xerv's Café</h1>
            </div>
        </div>
        <div class="w-5/12 flex items-center">
            @livewire('sales')
        </div>
        <div class="w-2/12 flex space-x-3 items-center">
            <a href="" class="text-white">
                <div class="flex items-center space-x-2">
                    <i class="material-icons md-36">account_circle</i>
                    <h1 class="underline">ADMINISTRATOR</h1>
                </div>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();" class="text-white hover:text-green-600">
                <div class="flex items-center space-x-2">
                    <i class="material-icons md-36">logout</i>
                </div>
            </a>
            </form>
        </div>
    </div>
</div>