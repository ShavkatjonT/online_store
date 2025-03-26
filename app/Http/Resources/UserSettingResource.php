<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSettingResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            'setting' => $this->setting, //->getTranslations('name')
            'value' => $this->value, // ->getTranslations('name')
            'switch' => $this->switch === null ? null : (bool)$this->switch,

        ];
    }
}
