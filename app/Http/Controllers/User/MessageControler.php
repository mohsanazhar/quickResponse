<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MessageModel;
use App\Models\User;
use Illuminate\Http\Request;

class MessageControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = MessageModel::where(['user_id'=>auth()->id()])->get();
        return view('users.messages.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipients = User::where(['create_by'=>auth()->id(),'user_type'=>'recipient'])->get();
        return view('users.messages.create',compact('recipients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid = validator()->make($request->input(),[
            'recipients'=>'required',
            'template_source'=>'required',
            'delivery_type'=>'required',
            'subject'=>'required'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid->errors())->withInput($request->input());
        }else{
            $d= $request->except('_token');
            $model = new MessageModel();
            $d['user_id'] =auth()->id();
            foreach ($d as $k=>$v){
                $model->$k = $v;
            }
            $model->save();
            session()->flash('success','Message is created successfully');
            return redirect()->to(route('messages.list'));
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
        $edit = MessageModel::find($id);
        $recipients = User::where(['create_by'=>auth()->id(),'user_type'=>'recipient'])->get();
        if (!is_null($edit)){
            return  view('users.messages.edit',compact('edit','recipients'));
        }else{
            session()->flash('error','Invalid request data');
            return redirect()->to(route('messages.list'));
        }
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
