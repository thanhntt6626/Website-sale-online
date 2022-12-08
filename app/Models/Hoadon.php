<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Hoadon extends Model
{
    use SoftDeletes;

    protected $table = 'hoadon_chitiethoadon';

    protected $primaryKey = 'ID';

    public $errors = [];
    public $timestamps = true;
    protected $dates = [];
    protected $filltable = [
        'id_sanpham',
        'id_nguoidung',
        'soluong',
        'ngay'


    ];
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham');
    }
    public function nguoidung()
    {
        return $this->belongsTo(User::class, 'id_nguoidung');
    }
}
