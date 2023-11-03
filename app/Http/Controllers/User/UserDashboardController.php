<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.dashboard');

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
     * user profile view
     */
    function profile_view(Request $request){
        $user = auth()->user();
        $user = User::find($user['id']);
        return view('users.settings.profile',compact('user'));
    }
    function profile(Request $request){
        $user = auth()->user();
            $user = User::find($user['id']);

            $d = $request->except('_token');
            foreach ($d as $k=>$v){
                if(!is_null($v)) {
                    $user[$k] = $v;
                }
            }
            $user->save();
            session()->flash('success','Profile is updated successfully');
            return redirect()->to(route('users.profile'));
    }
    /*
     * settings function
     */
    function settings(Request $request){
        return view('users.settings.setting');
    }
    /*
     * update setttings
     */
    function updateSettings(Request $request){
        if($request->method('post')){
            $valid = validator()->make($request->input(),[
                'password'=>'required',
                'new_password'=>'required|same:confirm_password',
                'confirm_password'=>'required'
            ]);
            if($valid->fails()){
                return redirect()->to(route('users.settings'))->withErrors($valid->errors());
            }else{
                $user = User::find(auth()->id());
                //dd(Hash::check($request->input('password'),$user['password']));
                if(Hash::check($request->input('password'),$user['password'])) {
                    $user->password = Hash::make($request->input('new_password'));
                    $user->save();
                    session()->flash('success', 'Password is updated successfully');
                    return redirect()->to(route('users.settings'));
                }else{
                    session()->flash('error', 'Please enter correct old password');
                    return redirect()->to(route('users.settings'));
                }
            }
        }
    }
}
