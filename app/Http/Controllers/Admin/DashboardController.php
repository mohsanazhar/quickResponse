<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountTypeModel;
use App\Models\SettingModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resellers = User::where(['user_type'=>'reseller'])->count();
        $recipients= User::where(['user_type'=>'recipients'])->count();
        $account_type = AccountTypeModel::count();
        return view('admin.dashboard',compact('resellers','recipients','account_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    /*
     * profile view
     */
    function profile(Request $request){
        $user = auth()->user();
        return view('admin.settings.profile',compact('user'));
    }
    /*
     * update proffile
     */
    function updateProfile(Request $request){
        $user = auth()->user();
        if($request->method("post")){
            $user = User::find($user['id']);

            $d = $request->except('_token');
            foreach ($d as $k=>$v){
                if(!is_null($v)) {
                    $user[$k] = $v;
                }
            }
            $user->save();
            session()->flash('success','Profile is updated successfully');
        }
        return redirect()->to(route('admin.profile'));
    }
    /*
     * login password view
     */
    function loginSettings(Request $request){
        return view('admin.settings.login_setting');
    }
    /*
     * update setttings
     */
    function updatePassword(Request $request){
        if($request->method('post')){
            $valid = validator()->make($request->input(),[
                'password'=>'required',
                'new_password'=>'required|same:confirm_password',
                'confirm_password'=>'required'
            ]);
            if($valid->fails()){
                return redirect()->to(route('admin.loginSettings'))->withErrors($valid->errors());
            }else{
                $user = User::find(auth()->id());
                if(Hash::check($request->input('password'),$user['password'])) {
                    $user->password = Hash::make($request->input('new_password'));
                    $user->save();
                    session()->flash('success', 'Password is updated successfully');
                    return redirect()->to(route('admin.loginSettings'));
                }else{
                    session()->flash('error', 'Please enter correct old password');
                    return redirect()->to(route('admin.loginSettings'));
                }
            }
        }
    }
    /*
     * general settings
     */
    function generalSettings(Request $request){
        $list = AccountTypeModel::where(['status'=>1])->get();
        $settings = SettingModel::where(['create_by'=>auth()->id()])->get();
        return view('admin.settings.general',compact('list','settings'));
    }
    /*
     * update settings
     */
    function saveSettings(Request $request){
        $d = $request->except('_token');
        $user = auth()->user();
        $temp = [];
        foreach ($d as $k=>$v){
            $temp[] = [
                'key'=>$k,
                'value'=>$v,
                'create_by'=>$user['id']
            ];
        }
        SettingModel::upsert($temp,['key']);
        session()->flash('success','Setting is saved');
        return redirect()->back();
    }
}
