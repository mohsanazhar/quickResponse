<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountTypeModel;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = AccountTypeModel::get()->toArray();
        return view('admin.accounts.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = validator()->make($request->input(),[
            'name'=>'required'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $d = $request->except('_token');
            $d['status'] = 0;
            if($request->has('status')){
                $d['status'] = 1;
            }
            $model = new AccountTypeModel();
            $model->fill($d);
            $model->save();
            session()->flash('success','New account type is created');
            return redirect()->to(route('accounts.list'));
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
        $edit = AccountTypeModel::find($id);
        if(is_null($edit)){
            return redirect()->back();
        }else {
            return view('admin.accounts.edit',compact('edit'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = AccountTypeModel::find($id);
        if(!is_null($model)){
            $d = $request->except('_token');
            $model->name = $d['name'];
            $model->counts = $d['counts'];
            $model->status = ($request->has('status'))?1:0;
            $model->save();
            session()->flash('success','Account type is updated');
            return redirect()->to(route('accounts.list'));
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
