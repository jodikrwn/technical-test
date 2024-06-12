<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeTemplateExport;
use App\Http\Requests\EmployeeImportRequest;
use App\Http\Requests\SearchEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Imports\EmployeeImport;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees      = Employee::orderBy('name', 'ASC')->get();
        $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
        $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();

        return view('pages.employee.index', compact('employees', 'departments', 'designations'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            Employee::create($validated);

            $employees      = Employee::orderBy('name', 'ASC')->get();
            $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
            $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();
            $data           = view('pages.employee.table', compact('employees', 'departments', 'designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Employee data added successfully.',
                'data'      => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                ['error' => 'An error occurred in performing this action.'],
                500
            );
        }
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $employee->update($validated);

            $employees      = Employee::orderBy('name', 'ASC')->get();
            $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
            $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();
            $data           = view('pages.employee.table', compact('employees', 'departments', 'designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Employee data updated successfully.',
                'data'      => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                ['error' => 'An error occurred in performing this action.'],
                500
            );
        }
    }

    public function destroy(Employee $employee)
    {
        DB::beginTransaction();

        try {
            $employee->delete();

            $employees      = Employee::orderBy('name', 'ASC')->get();
            $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
            $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();
            $data           = view('pages.employee.table', compact('employees', 'departments', 'designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Employee data deleted successfully.',
                'data'      => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                ['error' => 'An error occurred in performing this action.'],
                500
            );
        }
    }

    public function search(SearchEmployeeRequest $request)
    {
        try {
            $validated = $request->validated();

            $employees = Employee::where(
                fn ($query) => $query
                    ->where('name', 'LIKE', '%' . $validated['keyword'] . '%')
                    ->orWhere('email', 'LIKE', '%' . $validated['keyword'] . '%')
                    ->orWhereHas(
                        'department',
                        fn ($query) => $query->where('departments.name', 'LIKE', '%' . $validated['keyword'] . '%')
                    )
                    ->orWhereHas(
                        'designation',
                        fn ($query) => $query->where('designations.name', 'LIKE', '%' . $validated['keyword'] . '%')
                    )
            )->orderBy('name', 'ASC')->get();

            $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
            $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();
            $data           = view('pages.employee.table', compact('employees', 'departments', 'designations'))->render();

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => 'An error occurred in performing this action.'],
                500
            );
        }
    }

    public function exportTemplate(Excel $excel)
    {
        return $excel->download(
            new EmployeeTemplateExport,
            'employee-template.xlsx'
        );
    }

    public function import(EmployeeImportRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated  = $request->validated();
            $import     = new EmployeeImport();

            $import->import($validated['file']);

            if ($import->failures()->isNotEmpty()) {
                $errorMessage = 'In line ' . $import->failures()->first()->row() . ', ' . $import->failures()->first()->errors()[0];
                return response()->json(['error' => $errorMessage], 500);
            }

            $employees      = Employee::orderBy('name', 'ASC')->get();
            $departments    = Department::where('is_active', true)->orderBy('name', 'ASC')->get();
            $designations   = Designation::where('is_active', true)->orderBy('name', 'ASC')->get();
            $data           = view('pages.employee.table', compact('employees', 'departments', 'designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Employee data added successfully.',
                'data'      => $data
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(
                ['error' => 'An error occurred in performing this action.'],
                500
            );
        }
    }
}
