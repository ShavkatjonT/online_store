<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValueResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->getTranslations('name'),
            // "valueable_type" => $this->valueable_type,
            // "valueable_id" => $this->valueable_id,
        ];
    }
}
