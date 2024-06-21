<?php

namespace App\Models;


use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRUDModel extends Model
{
    use HasFactory;
    public function tes($request){
        echo "hao";
    }

    public function create_data($request, $table, $data){
        return DB::table($table)->insert($data);
    }

    public function read_data($request, $table, $where){
        return DB::table($table)->where($where)->get();
    }

    public function update_data($request, $table, $where, $data){
        return DB::table($table)->where($where)->update($data);
    }

    public function delete_data($request, $table, $where){
        return DB::table($table)->where($where)->delete();
    }
}
