<?php

namespace App\Http\Controllers;

use App\BoothPurchase;
use Illuminate\Http\Request;

class BoothPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $req = $request->all();
        $req['user_id'] = $user->id;
        $p = BoothPurchase::create($req);
        return $p;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BoothPurchase  $boothPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(BoothPurchase $boothPurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BoothPurchase  $boothPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(BoothPurchase $boothPurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BoothPurchase  $boothPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoothPurchase $boothPurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BoothPurchase  $boothPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoothPurchase $boothPurchase)
    {
        //
    }
}