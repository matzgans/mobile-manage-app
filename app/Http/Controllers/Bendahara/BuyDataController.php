<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendaharaBuyStoreRequest;
use App\Http\Requests\BendaharaBuyUpdateRequest;
use App\Models\BuyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return view('pages.bendahara.buy_data.index', compact('buys'));
        }

        $buys = BuyData::paginate(6);
        return view('pages.bendahara.buy_data.index', compact('buys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bendahara.buy_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BendaharaBuyStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            BuyData::create(
                [
                    'code' => $request['code'],
                    'buying_date' => $request['buying_date'],
                    'unit' => $request['unit'],
                    'price' => $request['price'],
                ]
            );

            DB::commit();
            return redirect()->back()->with('success', 'Data Pembelian Berhasil Di tambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BuyData $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyData $buy)
    {
        return view('pages.bendahara.buy_data.edit', compact('buy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BendaharaBuyUpdateRequest $request, BuyData $buy)
    {
        DB::beginTransaction();
        try {
            $buy->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Data Pembelian Berhasil Di Update');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyData $buy)
    {
        DB::beginTransaction();
        try {
            $buy->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Pembelian Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
