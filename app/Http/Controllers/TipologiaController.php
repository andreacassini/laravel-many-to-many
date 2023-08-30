<?php

namespace App\Http\Controllers;

use App\Models\Tipologia;
use App\Http\Requests\StoreTipologiaRequest;
use App\Http\Requests\UpdateTipologiaRequest;

class TipologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTipologiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipologiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipologia  $tipologia
     * @return \Illuminate\Http\Response
     */
    public function show(Tipologia $tipologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipologia  $tipologia
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipologia $tipologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipologiaRequest  $request
     * @param  \App\Models\Tipologia  $tipologia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipologiaRequest $request, Tipologia $tipologia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipologia  $tipologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipologia $tipologia)
    {
        //
    }
}
