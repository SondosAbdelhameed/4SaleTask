<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Requests\Api\PayOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Services\OrderFinalCost\OrderCostContext;


class OrderController extends Controller
{
    private $order_service;

    function __construct() {
        $this->order_service = new OrderService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                $order = new Order();
                $order->table_id = $request->table_id;
                $order->customer_id = $request->customer_id;
                $order->reservation_id = $request->reservation_id;
                $order->user_id = $request->user_id;
                $order->date = date('Y-m-d');
                $order->save();
                $order->sub_total = $this->order_service->storeOrderDetails($order->id,$request->items);
                $order->save();
            });
        } catch (Exception $e) {
            return "there is somethig wrong , please try again later";
        }

        return "Save Order Successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pay(PayOrderRequest $request) {
        $order = Order::find($request->order_id);
        $strategyService = new OrderCostContext($request->pay_way);

        $cost = $strategyService->pay($order->sub_total);
        $cost['paid'] = $request->amount_paied; 
        $order->update($cost);

        return "Paid successfully";
    }
}
