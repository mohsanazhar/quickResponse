<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id';
    protected $table ='settings';
    protected $fillable = ['key','value','create_by'];
}
