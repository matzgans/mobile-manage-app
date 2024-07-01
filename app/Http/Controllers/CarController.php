<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $cars = Car::where('code', 'like', '%' . $search . '%')->paginate(6);
            return view('pages.sales.car.index', compact('cars'));
        }
        $cars = Car::paginate(6);
        return view('pages.sales.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sales.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        $car = $request;
        DB::beginTransaction();
        try {
            $data = Car::create([
                'code' => $car['code'],
                'year' => $car['year'],
                'price' => strval($car['price']),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data Mobil Berhasil Di Tambahkan');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {

        return view('pages.sales.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        DB::beginTransaction();
        try {
            $car->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Data Mobil Berhasil Di Update');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        DB::beginTransaction();
        try {
            $car->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Mobil Berhasil Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
