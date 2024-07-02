<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendaharaSellStoreRequest;
use App\Http\Requests\BendaharaSellUpdateRequest;
use App\Models\SellData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return view('pages.bendahara.sell_data.index', compact('sells'));
        }

        $sells = SellData::paginate(6);
        return view('pages.bendahara.sell_data.index', compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bendahara.sell_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BendaharaSellStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            SellData::create(
                [
                    'code' => $request['code'],
                    'sale_date' => $request['sale_date'],
                    'unit' => $request['unit'],
                    'price' => $request['price'],
                ]
            );

            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Berhasil Di tambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SellData $sell)
    {
        return view('pages.bendahara.sell_data.edit', compact('sell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BendaharaSellUpdateRequest $request, SellData $sell)
    {
        DB::beginTransaction();
        try {
            $sell->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Berhasil Di Update');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellData $sell)
    {
        DB::beginTransaction();
        try {
            $sell->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
