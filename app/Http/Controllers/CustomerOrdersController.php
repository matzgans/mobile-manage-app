<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrdersStoreRequest;
use App\Http\Requests\CustomerOrdersUpdateRequest;
use App\Models\CustomerOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $customer_orders = CustomerOrders::where('code', 'like', '%' . $search . '%')->paginate(6);
            return view('pages.frontdesk.customer_orders.index', compact('customer_orders'));
        }
        $customer_orders = CustomerOrders::paginate(6);
        return view('pages.frontdesk.customer_orders.index', compact('customer_orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.frontdesk.customer_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerOrdersStoreRequest $request)
    {
        $customer_orders = $request;
        DB::beginTransaction();
        try {
            $data = CustomerOrders::create([
                'ktp_id' => $customer_orders['ktp_id'],
                'name' => $customer_orders['name'],
                'address' => $customer_orders['address'],
                'phone' => $customer_orders['phone'],
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data Pesanan Berhasil Di Tambahkan');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerOrders $customerOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerOrders $customer_order)
    {

        return view('pages.frontdesk.customer_orders.edit', compact('customer_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerOrdersUpdateRequest $request, CustomerOrders $customer_order)
    {
        try {
            $customer_order->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Data Pemesanan Berhasil Di Ubah');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerOrders $customer_order)
    {
        DB::beginTransaction();
        try {
            $customer_order->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Pemesanan Berhasil Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
