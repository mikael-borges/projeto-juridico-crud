<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LawyerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $lawyers = Lawyer::paginate();

        return view('lawyer.index', compact('lawyers'))
            ->with('i', ($request->input('page', 1) - 1) * $lawyers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lawyer = new Lawyer();

        return view('lawyer.create', compact('lawyer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LawyerRequest $request): RedirectResponse
    {
        Lawyer::create($request->validated());

        return Redirect::route('lawyers.index')
            ->with('success', 'Lawyer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $lawyer = Lawyer::find($id);

        return view('lawyer.show', compact('lawyer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lawyer = Lawyer::find($id);

        return view('lawyer.edit', compact('lawyer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LawyerRequest $request, Lawyer $lawyer): RedirectResponse
    {
        $lawyer->update($request->validated());

        return Redirect::route('lawyers.index')
            ->with('success', 'Lawyer updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Lawyer::find($id)->delete();

        return Redirect::route('lawyers.index')
            ->with('success', 'Lawyer deleted successfully');
    }
}
