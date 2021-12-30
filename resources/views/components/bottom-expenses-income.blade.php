<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <h3 class="m-6 text-2xl font-medium leading-6 text-gray-900 text-center">Latest Expenses and Incomes</h3>
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg flex flex-row">
        <table class="mr-3 divide-gray-200 w-full">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Date
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Amount
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($latestExpenses as $item)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
 
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$item->name}}
                    </div>

                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-rose-600">-{{$item->sum}}$</div>
              </td>
              @endforeach

            <!-- More people... -->
          </tbody>
        </table>
        <table class="ml-3 divide-gray-200 w-full">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Date
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Amount
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($latestIncomes as $item)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
 
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$item->name}}
                    </div>

                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-lime-600">{{$item->sum}}$</div>
              </td>
              @endforeach

            <!-- More people... -->
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
