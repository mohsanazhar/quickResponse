<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'funds';
    protected $fillable = ['payment_method','amount','status','user_id'];
    function user(){
        return $this->belongsTo(User::class,'approver');
    }
    function creator(){
        return $this->belongsTo(User::class,'user_id');
    }
}
