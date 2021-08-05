<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BrandController extends Controller
{
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
        return view('admin.tiendaApp.brand', compact('data', 'action', 'error', 'succes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return View
     */
    public function store(Request $request): View
    {
        $action = 'store';
        $error = '';
        $succes = true;
        try {
            $brand = new Brand();
            $brand->providerName = $request->get('newBrand');
            $brand->save();
            return view('admin.tiendaApp.brand', compact( 'action', 'error', 'succes'));
        }
        catch (Exception $exception) {
            $succes = false;
            $error = $exception->getMessage();
            return view('admin.tiendaApp.brand', compact( 'action', 'error', 'succes'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $action = 'edit';
        $error = '';
        $succes = true;
        try {
            $brand = Brand::find($request->get('selectBrand'));
            $brand->providerName = $request->get('editBrand');
            $brand->save();
            $data = Brand::getAllBrands();
            return view('admin.tiendaApp.brand',
                compact( 'data', 'action', 'error', 'succes'));
        }
        catch (Exception $exception) {
            $succes = false;
            $error = $exception->getMessage();
            $data = Brand::getAllBrands();
            return view('admin.tiendaApp.brand',
                compact( 'data','action', 'error', 'succes'));
        }
    }


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
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Brand  $brand
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Brand $brand)
//    {
//        //
//    }
//
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Brand  $brand
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Brand $brand)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Brand  $brand
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Brand $brand)
//    {
//        //
//    }
}
