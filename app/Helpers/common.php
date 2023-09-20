<?php
/**
 * Created by PhpStorm.
 * User: dawla
 * Date: 9/15/2023
 * Time: 10:19 AM
 */
 function adminUrl(){
    return url('/').'/'.adminUrl;
}
function userUrl(){
     return url('/').'/'.userUrl;
}
function resellerUrl(){
    return url('/').'/'.reseller;
}
function setting_item($key){
    $settings = \App\Models\SettingModel::where(['key'=>$key])->get()->first();
    if(!is_null($settings)){
        return $settings['value'];
    }else{
        return null;
    }
}
/*
 * calculate admin | reseller balance
 */
function add_balance_admin_account($user_id,$amount =0 ){
    $admin = \App\Models\User::where(['user_type'=>'admin'])->get()->first();
    // subtracting amount from user
    $user = \App\Models\User::find($user_id);
    $user->balance = $user->balance - $amount;
    $user->save();

    // adding amount in admin account
    $admin->balance = $admin->balance + $amount;
    $admin->save();
}