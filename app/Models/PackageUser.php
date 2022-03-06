<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    protected $fillable = [
        'packageId',
        'userId'
    ];

    protected $table = "package_user";

    public function user() {
        return $this->belongsTo(User::class, 'id', 'userId');
    }

    public function package() {
        return $this->belongsTo(Package::class, 'id', 'packageId');
    }
}
