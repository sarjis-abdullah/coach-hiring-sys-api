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
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function package() {
        return $this->belongsTo(Package::class, 'packageId', 'id');
    }
}
