<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\User;
use Nette\Schema\Expect;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $expenses = $user->expenses()->where('type', 'expense')->paginate(10);
        $incomes = $user->expenses()->where('type', 'income')->paginate(10);

        return view('expense.index', [
            'incomes'=> $incomes,
            'expenses' => $expenses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();
        
        $category = Category::where('name', $data['category'])->get()->first();
        
        if ($category == null)
        {
            $newCategory = new Category();
            $newCategory->user_id = $user->id;
            $newCategory->name = $data['category'];
            $newCategory->save();
        }

        $expense = new Expense();
        if($category == null) $expense->category_id = $newCategory->id;
        else $expense->category_id = $category->id;
        $expense->name = $data['name'];
        $expense->sum = $data['sum'];
        $expense->type = $data['type'];
        $expense->save();

       
        return redirect('/home')->with('success', 'Expense created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect('/expense')->with('success', 'Expense removed');
    }
}
