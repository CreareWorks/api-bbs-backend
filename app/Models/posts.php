<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    //テーブル設定を定義
    protected $table = 'posts'; //テーブル名がクラス名のスネークケースかつ複数形でない場合は紐付けが必要
    protected $primaryKey = 'post_id'; //主キーが'id'でない場合は、紐付けが必要

    protected $fillable = [
        'post_user_id',
        'post_title',
        'post_body'
    ];

    public function test()
    {
        
    }


}
