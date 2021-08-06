<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Item;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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

    /**
     * Display a listing of the resource.
     * @param $action
     * @return View
     */
    public function index($action): View
    {
        $error = '';
        $succes = false;
        $data = Brand::getAllBrands();
        return view('admin.tiendaApp.brand',
            compact('action', 'error', 'succes', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return View
     */
    public function store(Request $request): View
    {
        $action = 'storeItem';
        $error = '';
        $succes = true;
        try {
            $item = new Item();
            $item->name = $request->get('name');
            $item->size = $request->get('size');
            $item->observations = $request->get('observations');
            $item->providerId = $request->get('providerId');
            $item->onHand = $request->get('onHand');
            $item->shippingDate = $request->get('shippingDate');
            $item->save();
            $data = Brand::getAllBrands();
            return view('admin.tiendaApp.brand',
                compact( 'action', 'error', 'succes', 'data'));
        }
        catch (Exception $exception) {
            $succes = false;
            $error = $exception->getMessage();
            return view('admin.tiendaApp.brand',
                compact( 'action', 'error', 'succes'));
        }
    }
}
