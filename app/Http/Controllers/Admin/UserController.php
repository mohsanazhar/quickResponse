<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountTypeModel;
use App\Models\FundsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('accountType')->where('user_type','!=','admin')->get();
        return view('admin.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accountType = AccountTypeModel::where(['status'=>1])->get()->toArray();
        return view('admin.users.create',compact('accountType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $valid = validator()->make($request->input(),[
           'user_name'=>'required',
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
        $accountType = AccountTypeModel::where(['status'=>1])->get()->toArray();
        $user = User::find($id);
        if(!is_null($user)){
            return view('admin.users.edit',compact('user','accountType'));
        }else{
            return redirect()->to(route('users.listUser'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(!is_null($user)){
            $d = $request->except('_token');
            foreach ($d as $k=>$v){
                if(!is_null($v)) {
                    if ($k == "password") {
                        $user[$k] = Hash::make($v);
                    }
                    $user[$k] = $v;
                }
            }
            if(array_key_exists('status',$d)){
                $user['status'] = 1;
            }
            $user->save();
            session()->flash('success','User is updated successfully');
            return redirect()->to(route('users.listUser'));
        }else{
            return redirect()->to(route('users.listUser'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $model = User::find($id);
        if(!is_null($model)){
            $model->delete();
            session()->flash('success','User is deleted successfully');
            return redirect()->back();
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->back();
        }
    }
    /*
     * update status of users
     */
    function updateStats($type,$status,$id){
        $user = User::find($id);
        if(!is_null($user)){
            switch ($type){
                case 'payment':
                    $user->payment_status = $status;
                    $user->save();
                    session()->flash('success','Payment status is updated successfully');
                    break;
                case 'account':
                    $user->status = $status;
                    $user->save();
                    session()->flash('success','User status is updated successfully');
                    break;

            }
            return redirect()->back();
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->back();
        }
    }
    /*
     * reseller payments details views
     */
    function reseller_payments(Request $request){
        $users = User::with(['accountType','creater'])->where('user_type','!=','admin')->get();
        return view('admin.users.reseller_payments',compact('users'));
    }
    /*
     * funds create view
     */
    function funds_create(Request $request){
        $reseller = User::where(['user_type'=>'reseller','status'=>active])->get();
        return view('admin.funds.create',compact('reseller'));
    }
    /*
     * funds list view
     */
    function funds_list(Request $request){
        $list = FundsModel::with('creator')->get();
        return view('admin.funds.list',compact('list'));
    }
    /*
     * funds status
     */
    function funds_status($status,$id){
        $funds = FundsModel::find($id);
        if(!is_null($funds)){
            $funds->status = $status;
            $funds->approver = auth()->id();
            $funds->save();

            $user = User::find($funds['user_id']);
            if(!is_null($user)){
                $user['balance'] = $funds->amount + $user['balance'];
                $user->save();
            }
            session()->flash('success','Status and user balance are updated.');
            return redirect()->to(route('admin.funds.list'));
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->to(route('admin.funds.list'));
        }
    }
    /*
     * funds store
     */
    function funds_store(Request $request){
        $valid = validator()->make($request->input(),[
            'payment_method'=>'required',
            'amount'=>'required|min:1|numeric',
            'user_id'=>'required'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $d = $request->except('_token');
            $d['status'] = "unpaid";
            FundsModel::create($d);
            session()->flash('success','Funds request is created. Please mark it approved');
            return redirect()->to(route('admin.funds.list'));
        }
    }
}
