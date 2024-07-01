<?php

namespace App\Http\Controllers;

use App\Models\BuyData;
use Illuminate\Http\Request;

class BuyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $buys = BuyData::where('code', 'like', '%' . $search . "%")->paginate(6);
            return view('pages.director.buy_data.index', compact('buys'));
        }

        $buys = BuyData::paginate(6);
        return view('pages.director.buy_data.index', compact('buys'));
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
    public function show(BuyData $buyData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyData $buyData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuyData $buyData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyData $buyData)
    {
        //
    }
}
