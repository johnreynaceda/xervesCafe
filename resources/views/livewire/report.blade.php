<div>
    <div class="flex items-center">
        <img src="{{ asset('images/blacklogo.png') }}" class="h-20" alt="">
       <div class="flex ml-2 flex-col">
        <h1 class="text-3xl underline">Xerv's Café</h1>
        <h1 class="text-xl">POS Service</h1>
       </div>
    </div>
    <div class="bg white mt-10 text-center">
        <h1 class="text-2xl">SALES REPORT</h1>
        <h1 class="text-lg">{{ Carbon\Carbon::Today()->format('m-d-Y') }}</h1>
    </div>
    <div class=" mt-5 flex justify-center">
        <table id="example" class="table-auto" style="width:100%">
            <thead class="bg-black">
                  <tr>
                    <th width="10" class="border">#</th>
                    <th width="70" class="border">TRANSACTION_CODE</th>
                    <th width="150" class="border">TOTAL_AMOUNT</th>
                   
                  </tr>
                </thead>
                <tbody class="">
                    <?php $i=1?>
                @foreach ($sales as $item)
                <tr>
                <td class="border px-3">{{$i++}}</td>
                    <td class="border px-3">{{$item->transaction_code}}</td>
                    <td class="border px-3">&#8369;{{number_format($item->total_amount,2)}}</td>
                    
                  </tr>
                 
                @endforeach
                <tr>
                 <td></td>
                 <td></td>
                 <td class="border px-3 font-medium">Total: &#8369;{{number_format($sale,2)  }}</td>
                </tr>
                </tbody>
              </table>
    </div>
</div>
