<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

        public const GENDER_LABELS = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
    ];

    //public const CATEGORY_LABELS = [
    //1 => '商品のお届けについて',
    //2 => '商品の交換について',
    //3 => '商品トラブル',
    //4 => 'ショップへのお問い合わせ',
    //5 => 'その他',
    //];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
