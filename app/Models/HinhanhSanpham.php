<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhanhSanpham extends Model
{
    use HasFactory;
    protected $fillable = [
      'sanpham_id',
      'tenanh'
    ];
}
