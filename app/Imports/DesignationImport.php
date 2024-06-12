<?php

namespace App\Imports;

use App\Models\Designation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DesignationImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Designation([
            'name'          => $row['name'],
            'description'   => $row['description'],
            'is_active'     => ($row['status'] == 'Active' ? 1 : 0),
        ]);
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255|unique:designations,name|distinct',
            'description'   => 'required|string|max:500',
            'status'        => 'required|in:Active,Inactive'
        ];
    }
}
