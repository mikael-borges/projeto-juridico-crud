<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LegalRequest;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $legals = Legal::paginate();

        return view('legal.index', compact('legals'))
            ->with('i', ($request->input('page', 1) - 1) * $legals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $legal = new Legal();
        $lawyers = Lawyer::all();

        return view('legal.create', compact('legal', 'lawyers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LegalRequest $request): RedirectResponse
    {
        Legal::create($request->validated());

        return Redirect::route('legals.index')
            ->with('success', 'Legal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $legal = Legal::find($id);

        return view('legal.show', compact('legal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $legal = Legal::find($id);
        $lawyers = Lawyer::all();

        return view('legal.edit', compact('legal', 'lawyers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LegalRequest $request, Legal $legal): RedirectResponse
    {
        $legal->update($request->validated());

        return Redirect::route('legals.index')
            ->with('success', 'Legal updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Legal::find($id)->delete();

        return Redirect::route('legals.index')
            ->with('success', 'Legal deleted successfully');
    }
}
