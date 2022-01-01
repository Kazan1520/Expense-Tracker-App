<div class="mt-20 md:mt-0 md:col-span-2 ">
    <div class="shadow sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">
    <h2 style="font-size: 40px; justify-content:center">Create payments</h2>
    @if (isset($fromMe) && $fromMe->count())
    <table class="mr-3 divide-gray-200 w-full">
        <thead class="bg-gray-50 w-full">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
              Status
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
              Amount
            </th>
            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                From
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($fromMe as $item)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">

                <div class="">
                  <div class="text-sm font-medium text-gray-900">
                    {{ $item->name }}
                  </div>

              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-gray-900">{{ $item->status }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-gray-900">{{ $item->amount }}$</div>
              </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900 text-right">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
            </td>
        </tr>
            @endforeach

          <!-- More people... -->
        </tbody>
      </table>

    @else
        You don't have any payments
    @endif
    
        
    <div style="margin: 20px">
        <a href="{{ route('payment.create') }}" style="background-color: greenyellow; padding:15px; border-radius:20px;">Create a payment</a>

    </div>
      </div>
    </div>
</div>