<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'id',
        'name',
        'email',
        'number_phone',
        'address',
        'time_rent',
        'plat_rent',
        'product_rent',
        'company_id',
        'product_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}