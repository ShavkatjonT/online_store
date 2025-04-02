<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{

    public function created(Order $order): void
    {
        //
    }


    public function updated(Order $order): void
    {
        if ($order->status){

        }
    }


    public function deleted(Order $order): void
    {
        //
    }


    public function restored(Order $order): void
    {
        //
    }


    public function forceDeleted(Order $order): void
    {
        //
    }
}
