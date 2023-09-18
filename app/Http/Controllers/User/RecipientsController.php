<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RecipientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where(['create_by'=>auth()->id(),'user_type'=>'recipient'])->get();
        return view('users.recipients.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.recipients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = validator()->make($request->input(),[
            'first_name'=>'required',
            'last_name'=>"required",
            'email'=>'required',
            'phone'=>'required',
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $model = new User();
            $d = $request->except('_token');
            foreach ($d as $k=>$v) {
                $model->$k = $v;
            }
            $model->user_type = 'recipient';
            $model->create_by = auth()->id();
            $model->password = Hash::make('12345');
            if($request->has('status')){
                $model->status = 1;
            }else{
                $model->status = 0;
            }
            $model->save();
            session()->flash('success','New recipient is created');
            return redirect()->to(route('recipients.list'));
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
        if(!is_null($user)){
            return view('users.recipients.edit',compact('user'));
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->to(route('recipients.list'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid = validator()->make($request->input(),[
            'first_name'=>'required',
            'last_name'=>"required",
            'email'=>'required',
            'phone'=>'required',
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $model = User::find($id);
            if(!is_null($model)) {
                $d = $request->except('_token');
                foreach ($d as $k => $v) {
                    $model->$k = $v;
                }
                if($request->has('status')){
                    $model->status = 1;
                }else{
                    $model->status = 0;
                }
                $model->save();
                session()->flash('success', 'Recipient is updated');
            }else{
                session()->flash('error', 'Invaild request data');
            }
            return redirect()->to(route('recipients.list'));
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
