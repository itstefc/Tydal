<?php

namespace App\Http\Controllers;

use App\Models\Tydal;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class TydalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        return view('tydal.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tydal $tydal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tydal $tydal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tydal $tydal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tydal $tydal)
    {
        //
    }
}
