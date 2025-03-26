<?php

namespace App\Http\Controllers;

use App\Models\UserPaymentCards;
use App\Http\Requests\StoreUserPaymentCardsRequest;
use App\Http\Requests\UpdateUserPaymentCardsRequest;
use App\Http\Resources\UserPaymentCardResource;
use Illuminate\Http\Request;

class UserPaymentCardsController extends Controller
{

    public function index()
    {
        return $this->response(UserPaymentCardResource::collection($this->auth()->paymentCards));
    }


    public function store(StoreUserPaymentCardsRequest  $request)
    {

        // return $request->payment_card_type_id;


        $card = $this->auth()->paymentCards()->create([
            'number' => encrypt($request->number),
            'payment_card_type_id' => $request->payment_card_type_id,
            'exp_date' => encrypt($request->exp_date),
            'name' => encrypt($request->name),
            'holder_name' => encrypt($request->holder_name),
            'last_four_numbers' => encrypt(substr($request->number, -4)),

        ]);

        return $this->success('user card added', $card);
    }


    public function show($id)
    {
        return $this->response(new UserPaymentCardResource($this->auth()->paymentCards()->find($id)));
    }


    public function destroy($id)
    {
        if ($this->auth()->paymentCards()->find($id)->delete()) {
            return $this->success('User card deleted');
        }

        return $this->error('Failed to delete user card');
    }
}
