<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPaymentCards extends Model
{
    /** @use HasFactory<\Database\Factories\UserPaymentCardsFactory> */
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'number',
        'last_four_numbers',
        'exp_date',
        'name',
        'holder_name',
        'payment_card_type_id'
    ];
    public function type(): BelongsTo
    {
        return $this->belongsTo(PaymentCardType::class, 'payment_card_type_id',);
    }
}
