<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $expenses = $user->expenses()->where('type', 'expense')->get();
        $incomes = $user->expenses()->where('type', 'income')->get();
        
        $latestExpenses = $user->expenses()->where('type', 'expense')->orderByDesc('created_at')->limit(4)->get();
        $latestIncomes = $user->expenses()->where('type', 'income')->orderByDesc('created_at')->limit(4)->get();

        $categories = $user->categories;
        $sumExpenses =  $user->expenses->where('type', 'expense')->sum('sum');
        $sumIncomes =  $user->expenses->where('type', 'income')->sum('sum');
        return view('home', [
            'categories' => $categories,
            'expenses' => $expenses,
            'incomes' => $incomes,
            'sumExpenses' => $sumExpenses,
            'sumIncomes' => $sumIncomes,
            'latestExpenses' => $latestExpenses,
            'latestIncomes' => $latestIncomes,
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
    public function store(Request $request)
    {
        //
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
        //
    }
}
