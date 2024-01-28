<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'model',
        'merk',
        'type',
        'speed',
        'transmition',
        'fuel',
        'years_output',
        'description',
        'company_id',
        'location',
        'price',
        'image',
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        $carbonDate = Carbon::parse($value);
        return $carbonDate->format('d / m / Y  -  H:i');
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
