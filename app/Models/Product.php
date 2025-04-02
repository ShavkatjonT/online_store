<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasTranslations, SoftDeletes;
    protected $fillable = ['category_id', 'name', 'description', 'price',];

    public $translatable = ['name', 'description'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function withStock($stockId): static
    {
        $this->stocks = [$this->stocks()->findOrFail($stockId)];
        return $this;
    }


    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function getDiscount()
    {
        if ($this->discount) {
            if ($this->discount->from === null && $this->discount->to === null) {
                return $this->discount;
            } else {
                if (Carbon::now()->between( Carbon::parse( $this->discount->from ), Carbon::parse( $this->discount->to ) )) {
                    return $this->discount;
                } else {
                    return null;
                }
            }
        } else {
            return null;
        }
    }
}
