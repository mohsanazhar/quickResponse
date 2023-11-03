<?php

namespace App\Http\Controllers\Reseller;

use App\Http\Controllers\Controller;
use App\Models\AccountTypeModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('accountType')->where(['user_type'=>'web','create_by'=>auth()->id()])->get();
        return view('reseller.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allowed_account_type = setting_item('reseller_allowed_account_type');
        $accountType = AccountTypeModel::find($allowed_account_type);
        $account[] = (!is_null($accountType))?$accountType->toArray():[];
        return view('reseller.users.create',compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = validator()->make($request->input(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'account_type'=>'required'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $model = new User();
            $d = $request->except('_token');
            foreach ($d as $k=>$v){

                $model->$k = $v;
            }
            $model->create_by = auth()->id();
            if(!is_null($d['account_type'])){
                $account_type = AccountTypeModel::find($d['account_type']);
                $user = User::find(auth()->id());
                if($user['balance']<$account_type['amount']){
                    session()->flash('error','Please deposit fund in your account to create this user');
                    return redirect()->back();
                }else{
                    add_balance_admin_account(auth()->id(),$account_type['amount']);
                }
            }
            $model->save();
            session()->flash('success','User is created successfully');
            return redirect()->back();
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
        $user = User::find($id);
        $allowed_account_type = setting_item('reseller_allowed_account_type');
        $accountType = AccountTypeModel::find($allowed_account_type);
        $account[] = (!is_null($accountType))?$accountType->toArray():[];
        return view('reseller.users.edit',compact('user','account'));
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
