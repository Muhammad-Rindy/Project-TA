<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companys';
    protected $fillable = [
        'id',
        'name',
        'email',
        'user_id',
        'address',
        'description',
        'number_phone',
        'image',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
