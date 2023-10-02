<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'mobile'
    ];

    protected $casts = [
        'mobile' => 'boolean'
    ];

    public function number(): Attribute
    {
        return Attribute::set(
            fn($number) => preg_replace("/[^0-9]/", "", $number)
        );
    }
}
