<?php

namespace App\Http\Controllers;

use App\Models\Tydal;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TydalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        return view('tydals.index', [
            'tydal' => Tydal::with('user')->latest()->get()
        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $request->user()->tydal()->create($validated);
        return redirect(route('tydal.index'));
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
        // dd($tydal);

        return view('tydals.edit', [
            'tydal' => $tydal
        ]);
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
