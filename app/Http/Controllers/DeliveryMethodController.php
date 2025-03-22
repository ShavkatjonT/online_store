<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Http\Requests\StoreDeliveryMethodRequest;
use App\Http\Requests\UpdateDeliveryMethodRequest;
use Illuminate\Database\Eloquent\Collection;

class DeliveryMethodController extends Controller
{

    public function index(): Collection
    {
        return DeliveryMethod::all();
    }


    public function create() {}


    public function store(StoreDeliveryMethodRequest $request) {}


    public function show(DeliveryMethod $deliveryMethod) {}


    public function edit(DeliveryMethod $deliveryMethod) {}


    public function update(UpdateDeliveryMethodRequest $request, DeliveryMethod $deliveryMethod) {}


    public function destroy(DeliveryMethod $deliveryMethod) {}
}
