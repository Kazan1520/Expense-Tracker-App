<div class="mx-20 flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <h3 class="m-6 text-2xl font-medium leading-6 text-gray-900 text-center">Expenses and Incomes</h3>
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg flex flex-row">
        <table class="mr-20 divide-gray-200 w-full">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Amount
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Delete
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @if (count($expenses) == 0)
            <td></td><td class="w-full text-center">You have no expenses</td><td></td><td></td>
          @endif
            @foreach ($expenses as $item)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
 

                    <div class="text-sm font-medium text-gray-900">
                      {{$item->name}}


                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="text-sm text-gray-900">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-rose-600">-{{$item->sum}}$</div>
              </td>
              <td class="text-right">                
                <form action="{{ route('expense.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                  <button id="delete" name="clicked" value="delete" type="submit" va class="m-2 bg-red-500 text-white p-2 font-medium rounded-md">
                  Delete
              </button></td>
            </tr>
              @endforeach
          </tbody>
        </table>


        


        <table class="ml-3  divide-gray-200 w-full">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                Date
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Amount
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                Delete
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @if (count($incomes) == 0)
                <td></td><td class="w-full text-center">You have no incomes </td><td></td><td></td>
            @endif
            @foreach ($incomes as $item)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
 

                    <div class="text-sm font-medium text-gray-900">
                      {{$item->name}}
                    </div>


              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 text-center">{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-lime-600">{{$item->sum}}$</div>
              </td>
              <td class="text-right">                
                <form action="{{ route('expense.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                  <button id="delete" name="clicked" value="delete" type="submit" va class="m-2 bg-red-500 text-white p-2 font-medium rounded-md">
                  Delete
              </button></td>
              @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
