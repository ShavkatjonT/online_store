<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Translatable\HasTranslations;


class StockResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $attributes = json_decode($this->attributs);
        $result = [
            'quantity' => $this->quantity,
            'stock_id' => $this->id,
        ];

        foreach ($attributes as $value) {
            $attribute = Attribute::find($value->attribute_id);
            $attributeValue = Value::find($value->value_id);

            $result[$attribute->name] = $attributeValue->getTranslations('name');
        }


        return $result;
    }
}
