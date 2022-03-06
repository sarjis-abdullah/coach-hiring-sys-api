<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "price",
        "publishDate",
        "sessionTime",
        "createdByUserId"
    ];

    function createdByUser(){
        return $this->belongsTo(User::class, "createdByUserId");
    }

    public function packageUsers()
    {
        return $this->hasMany(PackageUser::class, 'packageId', 'id');
    }
}
