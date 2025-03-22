<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        // dd();
        /*
        Request body example: 
        {
            "comment":"Test", // ixtiyari
            "delivery_method_id":2, // required
            "payment_type_id":1, // required
            "sum":169000, // ixtiyari
            "address_id":2,// ixtiyari
            "products":[// required
                {
                    "product_id":2,
                    "stock_id":4,
                    "quantity":1
                },
                {
                    "product_id":3,
                    "stock_id":7,
                    "quantity":2
                }
        }
        
        
        */
        return [
            'delivery_method_id' => ['required', 'numeric'],
            'payment_type_id' => ['required', 'numeric'],
            'products' => ['required', 'array'],
            'products.*' => ['required', 'array'], //'array:'
            'products.*.product_id' => ['required', 'numeric'],
            'products.*.stock_id' => ['nullable', 'numeric'],
            'products.*.quantity' => ['required', 'numeric'],

            // Faqat ruxsat etilgan maydonlarga cheklov qo‘yish:
            'products.*' => function ($attribute, $value, $fail) {
                $allowedKeys = ['product_id', 'stock_id', 'quantity'];
                foreach ($value as $key => $val) {
                    if (!in_array($key, $allowedKeys)) {
                        $fail("The $attribute.$key field is not allowed.");
                    }
                }
            },

            'comment' => ['nullable', 'max:500'],
        ];
    }

    public function messages()
    {
        return  [
            "delivery_method_id"=>"Id kiring"
        ];
    }
}
