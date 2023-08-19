<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    //テーブル設定を定義
    protected $table = 'comments'; //テーブル名がクラス名のスネークケースかつ複数形でない場合は紐付けが必要
    protected $primaryKey = 'comment_id'; //主キーが'id'でない場合は、紐付けが必要

    protected $fillable = [
        'comment_user_id',
        'comment_post_id',
        'comment_body',
    ];

    

}
