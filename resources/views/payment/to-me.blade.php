<div class="mt-20 md:mt-0 md:col-span-2 ">
    <div class="shadow sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">
    <h2 style="font-size: 40px; justify-content:center">Requested payments</h2>
    @if (isset($toMe) && $toMe->count())
    <table class="mr-3 divide-gray-200 w-full">
        <thead class="bg-gray-50">
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
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($toMe as $item)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">

                <div class="">
                  <div class="text-sm font-medium text-gray-900">
                    {{ $item->name }}
                  </div>

              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-gray-900">{{ $item->status }}$</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-gray-900">{{ $item->amount }}$</div>
              </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900 text-right">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
            </td>
            @if ($item->status == 'waiting')
            <td>
                <button id="approve" class="m-2 bg-green-500 text-white p-2 font-medium rounded-md">
                    Approve
                </button>
                <button id="decline" class="m-2 bg-red-500 text-white p-2 font-medium rounded-md">
                    Decline
                </button>

                </button>
            </td>
                
            @endif
        </tr>
            @endforeach

          <!-- More people... -->
        </tbody>
      </table>

    @else
        You don't have any payments
    @endif
    

      </div>
    </div>
</div>