<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\FundsModel;
use Illuminate\Http\Request;

class FundsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = FundsModel::with('user')->where(['user_id'=>auth()->id()])->get();
        return view('reseller.funds.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reseller.funds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = validator()->make($request->input(),[
            'payment_method'=>'required',
            'amount'=>'required|min:1|numeric'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $d = $request->except('_token');
            $d['user_id'] = auth()->id();
            $d['status'] = "unpaid";
            FundsModel::create($d);
            session()->flash('success','Funds request is send to admin. Please wait for approval');
            return redirect()->to(route('funds.list'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
