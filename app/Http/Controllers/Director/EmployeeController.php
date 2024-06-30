<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
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
                'place_birth' => $employee['place_birth'],
                'religion' => $employee['religion'],
                'phone' => $employee['phone'],
                'education' => $employee['education'],
                'salary' => $employee['salary'],
                'devision' => $employee['devision'],
                'address' => $employee['address'],
            ]);

            switch ($data->devision) {
                case 'Director':
                    $data->assignRole('director');
                    break;
                case 'Marketing':
                    $data->assignRole('sales');
                    break;
                case 'Mekanik':
                    $data->assignRole('mekanik');
                    break;
                case 'Frontdesk':
                    $data->assignRole('frontdesk');
                    break;
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data Karyawan Berhasil Di Tambahkan');
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
    public function edit(User $employee)
    {
        return view('pages.director.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, User $employee)
    {
        DB::beginTransaction();
        try {
            $employee->update($request->all());

            // Re-fetch the updated employee data
            $employee->refresh();
            switch ($employee->devision) {
                case 'Director':
                    DB::table('model_has_roles')->where('model_id', $employee->id)->delete();
                    $employee->assignRole('director');
                    break;
                case 'Marketing':
                    DB::table('model_has_roles')->where('model_id', $employee->id)->delete();
                    $employee->assignRole('sales');
                    break;
                case 'Mekanik':
                    DB::table('model_has_roles')->where('model_id', $employee->id)->delete();
                    $employee->assignRole('mekanik');
                    break;
                case 'Frontdesk':
                    DB::table('model_has_roles')->where('model_id', $employee->id)->delete();
                    $employee->assignRole('frontdesk');
                    break;
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data Karyawan Berhasil Di Ubah');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        DB::beginTransaction();
        try {
            $employee->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Karyawan Berhasil Di Hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
