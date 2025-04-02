<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller as RoutingController;


abstract class Controller  extends RoutingController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getClosedOrdersQuery(array $date): Builder
    {
        return Order::query()
            ->whereBetween('created_at', [$date['from'], Carbon::parse($date['to'])->endOfDay()])
            ->whereRelation('status', 'code', 'closed');
    }

    public function getDateRange(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return ['from' => $from, 'to' => $to];
    }
    public function auth()
    {
        return auth()->user();
    }
    public function response($data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ]);
    }
    public function success(string $message,  $data = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => "success",

            'massage' => $message ?? 'operation successsfull',
            'data' => $data,
        ]);
    }
    public function error(string $message,  $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status' => "error",

            'massage' => $message ?? 'error occured',
            'data' => $data,
        ]);
    }
}
