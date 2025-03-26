<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCardType extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentCardTypeFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'icon',
    ];

    
}
