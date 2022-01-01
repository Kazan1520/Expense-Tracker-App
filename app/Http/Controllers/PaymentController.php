<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Category;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $toMe = $user->paymentsReceived;//do mnie
        $fromMe = $user->paymentsMade;// ode mnie
        return view('payment.index',[
            'toMe' => $toMe,
            'fromMe' => $fromMe,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->except(Auth::id());
        return view('payment.create', [
            'users' => $users
        ]);
    }
    // public function setApprove(Request $request)
    // {
    //     dd($request->all);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->all();
        $payment = new Payment();
        $payment->payer_id = auth()->user()->id;
        $payment->payee_id = $data['payee'];
        $payment->name = $data['name'];
        $payment->status = 'waiting';
        $payment->amount = $data['amount'];
        $payment->save();
        return redirect('/payment')->with('success', 'payment made!');
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
        $data = $request->all();
        $payment = Payment::find($id);
        if($data['clicked'] == 'approve')
        {
            $payment->status='approved';
            $success = 'Change status to approved!';
            $expense = new Expense();
            $category = Category::where('name', 'Created')->where('id', $payment->payer_id)->get()->first();
            if ($category == null)
            {
                $newCategory = new Category();
                $newCategory->user_id = $payment->payer_id;
                $newCategory->name = 'Created';
                $newCategory->save();
                $category = $newCategory;
            }

            $expense->category_id = $category->id;
            $expense->name = $payment->name;
            $expense->sum = $payment->amount;
            $expense->type = 'income';
            $expense->save();
            
            $category = Category::where('name', 'Requested')->where('id', $payment->payee_id)->get()->first();
            if ($category == null)
            {
                $newCategory = new Category();
                $newCategory->user_id = $payment->payee_id;
                $newCategory->name = 'Requested';
                $newCategory->save();
                $category = $newCategory;
            }
            $expense = new Expense();
            $expense->category_id = $category->id;
            $expense->name = $payment->name;
            $expense->sum = $payment->amount;
            $expense->type = 'expense';
            $expense->save();


        }
        if($data['clicked']=='decline')
        {
            $payment->status='rejected';
            $success = 'Change status to rejected!';
        } 

        $payment->save();
        return redirect('/payment')->with('success', $success);
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
