<?php

namespace App\Http\Controllers;

use App\Exports\DepartmentTemplateExport;
use App\Http\Requests\DepartmentImportRequest;
use App\Http\Requests\SearchDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Imports\DepartmentImport;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name', 'ASC')->get();
        return view('pages.department.index', compact('departments'));
    }

    public function store(StoreDepartmentRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            Department::create($validated);

            $departments    = Department::orderBy('name', 'ASC')->get();
            $data           = view('pages.department.table', compact('departments'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Department data added successfully.',
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

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $department->update($validated);

            $departments    = Department::orderBy('name', 'ASC')->get();
            $data           = view('pages.department.table', compact('departments'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Department data updated successfully.',
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

    public function destroy(Department $department)
    {
        DB::beginTransaction();

        try {
            $department->delete();

            $departments    = Department::orderBy('name', 'ASC')->get();
            $data           = view('pages.department.table', compact('departments'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Department data deleted successfully.',
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

    public function search(SearchDepartmentRequest $request)
    {
        try {
            $validated      = $request->validated();
            $departments    = Department::where('name', 'LIKE', '%' . $validated['keyword'] . '%')->orderBy('name', 'ASC')->get();
            $data           = view('pages.department.table', compact('departments'))->render();

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
            new DepartmentTemplateExport,
            'department-template.xlsx'
        );
    }

    public function import(DepartmentImportRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated  = $request->validated();
            $import     = new DepartmentImport();

            $import->import($validated['file']);

            if ($import->failures()->isNotEmpty()) {
                $errorMessage = 'In line ' . $import->failures()->first()->row() . ', ' . $import->failures()->first()->errors()[0];
                return response()->json(['error' => $errorMessage], 500);
            }

            $departments    = Department::orderBy('name', 'ASC')->get();
            $data           = view('pages.department.table', compact('departments'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Department data added successfully.',
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
