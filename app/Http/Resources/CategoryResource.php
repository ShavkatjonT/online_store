<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'icon' => $this->icon,
            'order' => $this->order,
            'parent_id' => $this->parent_id,
            'child_categories' => $this->childCategories, //self::collection($this->childCategories)
            // 'parent_categories' => $this->parentCategory, //
        ];
    }
}
