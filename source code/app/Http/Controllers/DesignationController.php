<?php

namespace App\Http\Controllers;

use App\Exports\DesignationTemplateExport;
use App\Http\Requests\DesignationImportRequest;
use App\Http\Requests\SearchDesignationRequest;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Imports\DesignationImport;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::orderBy('name', 'ASC')->get();
        return view('pages.designation.index', compact('designations'));
    }

    public function store(StoreDesignationRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            Designation::create($validated);

            $designations   = Designation::orderBy('name', 'ASC')->get();
            $data           = view('pages.designation.table', compact('designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Designation data added successfully.',
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

    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $designation->update($validated);

            $designations   = Designation::orderBy('name', 'ASC')->get();
            $data           = view('pages.designation.table', compact('designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Designation data updated successfully.',
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

    public function destroy(Designation $designation)
    {
        DB::beginTransaction();

        try {
            $designation->delete();

            $designations   = Designation::orderBy('name', 'ASC')->get();
            $data           = view('pages.designation.table', compact('designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Designation data deleted successfully.',
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

    public function search(SearchDesignationRequest $request)
    {
        try {
            $validated      = $request->validated();
            $designations   = Designation::where('name', 'LIKE', '%' . $validated['keyword'] . '%')->orderBy('name', 'ASC')->get();
            $data           = view('pages.designation.table', compact('designations'))->render();

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
            new DesignationTemplateExport,
            'designation-template.xlsx'
        );
    }

    public function import(DesignationImportRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated  = $request->validated();
            $import     = new DesignationImport();

            $import->import($validated['file']);

            if ($import->failures()->isNotEmpty()) {
                $errorMessage = 'In line ' . $import->failures()->first()->row() . ', ' . $import->failures()->first()->errors()[0];
                return response()->json(['error' => $errorMessage], 500);
            }

            $designations   = Designation::orderBy('name', 'ASC')->get();
            $data           = view('pages.designation.table', compact('designations'))->render();

            DB::commit();

            return response()->json([
                'success'   => 'Designation data added successfully.',
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
