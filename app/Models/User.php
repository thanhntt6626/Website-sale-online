<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id_nguoidung';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'username',
        'password',
        'diachi',
        'email',
        'sdt', 'image',
        'quyenSD'

    ];
    /**
     * wards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function binhluan()
    {
        return $this->hasMany(Binhluan::class, 'id_nguoidung');
    }
    public function hoadon()
    {
        return $this->hasMany(Hoadon::class, 'id_nguoidung');
    }
}
