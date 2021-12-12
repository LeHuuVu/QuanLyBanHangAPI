<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function SanPhams()
    {
        return $this->belongsToMany(SanPham::class)->withPivot('amount');
    }
    public function User()
    {
        return $this->belongsTo(User::class)->withTimestamps();
    }
}
