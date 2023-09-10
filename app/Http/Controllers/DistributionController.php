<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('distributions.index', [
            'distributions' => Distribution::with('user')->latest()->get(),
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
            'distribution' => 'required|string|max:16',
        ]);

        $request->user()->distributions()->create($validated);

        return redirect(route('distributions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribution $distribution): View
    {
        $this->authorize('update', $distribution);

        return view('distributions.edit', [
            'distribution' => $distribution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribution $distribution):RedirectResponse
    {
        $this->authorize('update', $distribution);

        $validated = $request->validate([
            'distribution' => 'required|string|max:16',
        ]);

        $distribution->update($validated);

        return redirect(route('distributions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribution $distribution)
    {
        $this->authorize('delete', $distribution);

        $distribution->delete();

        return redirect(route('distributions.index'));
    }
}
