<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleUpdateRequest;
use App\Models\Car;
use App\Models\CustomerOrder;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $sales = Sale::with('customer')->whereHas('customer', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(6);
            return view('pages.sales.buys.index', compact('sales'));
        }
        $sales = Sale::paginate(6);
        return view('pages.sales.buys.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = CustomerOrder::all();
        $cars = Car::all();
        return view('pages.sales.buys.create', compact(['customers', 'cars']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleStoreRequest $request)
    {
        $sale = $request;
        DB::beginTransaction();
        try {
            Sale::create([
                'customer_id' => $sale['customer_id'],
                'car_id' => $sale['car_id'],
                'unit' => $sale['unit'],
                'price' => $sale['price'],
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Barang Berhasil Di Tambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $customers = CustomerOrder::all();
        $cars = Car::all();
        return view('pages.sales.buys.edit', compact(['sale', 'customers', 'cars']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        DB::beginTransaction();
        try {
            $sale->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Barang Berhasil Di Ubah');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        DB::beginTransaction();
        try {
            $sale->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Penjualan Barang Berhasil Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
