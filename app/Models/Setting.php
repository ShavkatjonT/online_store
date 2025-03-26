<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    public function values(): MorphMany
    {
        return $this->morphMany(Value::class, 'valueable');
    }
}
