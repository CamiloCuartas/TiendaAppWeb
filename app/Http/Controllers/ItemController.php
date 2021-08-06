<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $item = Item::find($request->get('id'));
            $item->delete();
            return response()->json(['error' => false]);
        }
        catch (Exception $exception) {
            return response()->json(['error' => true, 'messaje' => $exception->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $request
     * @return JsonResponse
     */
    public function edit(Request $request): JsonResponse
    {
        try {
            $item = Item::find($request->get('id'));
            $item->name = $request->get('name');
            $item->size = $request->get('size');
            $item->observations = $request->get('observations');
            $item->onHand = $request->get('onHand');
            $item->shippingDate = $request->get('shippingDate');
            $item->update();
            return response()->json(['error' => false]);
        }
        catch (Exception $exception) {
            return response()->json(['error' => true, 'messaje' => $exception->getMessage()]);
        }
    }


//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Item  $item
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Item $item)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Item  $item
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Item $item)
//    {
//        //
//    }
}
