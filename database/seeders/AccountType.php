<?php

namespace Database\Seeders;

use App\Models\AccountTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = ['Single','Premium','Ultimate'];
        foreach ($type as $k=>$v){
            AccountTypeModel::create([
                'name'=>$v,
                'status'=>1
            ]);
        }
    }
}
