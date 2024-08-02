<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'danhmuc_id',
        'thuonghieu_id',
        'price',
        'description',
        'status'
    ];

    public function hinhanhs()
    {
        return $this->hasMany(HinhanhSanpham::class, 'sanpham_id', 'id');
    }

    public function danhmuc()
    {
        return $this->belongsTo(Danhmuc::class, 'danhmuc_id', 'id');
    }
}
