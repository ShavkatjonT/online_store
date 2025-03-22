<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use Illuminate\Database\Eloquent\Collection;

class PaymentTypeController extends Controller
{

    public function index(): Collection
    {
        return PaymentType::all();
    }

    public function create() {}


    public function store(StorePaymentTypeRequest $request) {}


    public function show(PaymentType $paymentType) {}


    public function edit(PaymentType $paymentType) {}


    public function update(UpdatePaymentTypeRequest $request, PaymentType $paymentType) {}


    public function destroy(PaymentType $paymentType) {}
}
