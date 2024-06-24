<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $employees = User::where('name', 'like', '%' . $search . '%')->paginate(6);
            return view('pages.director.employee.index', compact('employees'));
        }

        $employees = User::paginate(6);
        return view('pages.director.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.director.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {

        $employee = $request;

        DB::beginTransaction();
        try {
            $data = User::create([
                'name' => $employee['name'],
                'email' => $employee['email'],
                'password' => bcrypt('password'),
                'id_card' => $employee['id_card'],
                'date_birth' => $employee['date_birth'],
                'religion' => $employee['religion'],
                'phone' => $employee['phone'],
                'education' => $employee['education'],
                'salary' => $employee['salary'],
                'devision' => $employee['devision'],
                'address' => $employee['address'],
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
