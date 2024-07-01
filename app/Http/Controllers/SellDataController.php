<?php

namespace App\Http\Controllers;

use App\Models\SellData;
use Illuminate\Http\Request;

class SellDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $sells = SellData::where('code', 'like', '%' . $search . "%")->paginate(6);
            return view('pages.director.sell_data.index', compact('sells'));
        }

        $sells = SellData::paginate(6);
        return view('pages.director.sell_data.index', compact('sells'));
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
    public function show(SellData $sellData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SellData $sellData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SellData $sellData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellData $sellData)
    {
        //
    }
}
