<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;
use PhpParser\ErrorHandler\Collecting;

class StatsController extends Controller
{
    public function ordersCount(Request $request)
    {
        $date = $this->getDateRange($request);
        return $this->response($this->getClosedOrdersQuery($date)->count());
    }

    public function ordersSalesSum(Request $request)
    {
        $date = $this->getDateRange($request);
        return $this->response($this->getClosedOrdersQuery($date)->sum('sum'));
    }

    public function deliveryMethodsRatio(Request $request)
    {

        $response = [];
        $date = $this->getDateRange($request);
        $allOrders = $this->getClosedOrdersQuery($date)->count();

        foreach (DeliveryMethod::all() as $deliveryMethod) {
            $deliveryMethodOrdersCount = $deliveryMethod->orders()
                ->whereBetween('created_at', [$date['from'], Carbon::parse($date['to'])->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();

            $response[] = [
                'amount' =>  $deliveryMethodOrdersCount,
                'name' => $deliveryMethod->getTranslations('name'),
                'percentage' => round(($deliveryMethodOrdersCount / $allOrders) * 100, 2),
            ];
        }

        return $this->response($response);
    }

    public function ordersCountByDays(Request $request)
    {
        $date = $this->getDateRange($request);
        $days = CarbonPeriod::create($date['from'], Carbon::parse($date['to'])->endOfDay());
        $response = new Collection();
        LazyCollection::make($days->toArray())->each(function ($day) use ($date, $response) {
            $count =  Order::query()
                ->where('created_at', $day->format('Y-m-d'))
                ->whereRelation('status', 'code', 'closed')
                ->count();

            $response[] = [
                'date' => $day->format('Y-m-d'),
                'orders_count' => $count,
            ];
        });
        return $this->response($response);
    }
}
