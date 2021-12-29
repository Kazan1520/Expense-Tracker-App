<div class="mt-10 sm:mt-0">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0 w-full">
          <h3 class="m-6 text-4xl font-medium leading-6 text-gray-900 text-center">Add an expense or income</h3>
          </p>
          @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('expense.store') }}" method="POST">
          @csrf
          <div class="shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-6 sm:col-span-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name of an Expense</label>
                  <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-4">
                  <label for="sum" class="block text-sm font-medium text-gray-700">Amout of money</label>
                  <input type="text" name="sum" id="sum" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full block shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-4 ">
                  <label for="category" class="block text-sm font-medium text-gray-700">Type</label>
                  <input type="text" id="category" name="category" list="categories" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <datalist id="categories">
                     @foreach ($categories as $category)
                       <option value="{{ $category->name }}">{{ $category->name }}</option>
                     @endforeach
                   </datalist>
                </div>
                <br />
                <div class="col-span-6 sm:col-span-3 w-full flex items-center">
                <label class="inline-flex items-center m-2">
                    <input type="radio" class="form-radio" name="type" value="expense">
                    <span class="ml-2">Expense</span>
                  </label>
                  <label class="inline-flex items-center m-2">
                    <input type="radio" class="form-radio" name="type" value="income">
                    <span class="ml-2">Income</span>
                  </div>
              </div>
            </div>
            <div class="px-4 py-3 text-center sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
