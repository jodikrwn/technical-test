<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeeImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $departmentId   = Department::where('name', $row['department_name'])->pluck('id')->first();
        $designationId  = Department::where('name', $row['designation_name'])->pluck('id')->first();
        $birthDate      = Carbon::createFromFormat('d/m/Y',  $row['birth_date'])->format('Y-m-d');
        $joinDate       = Carbon::createFromFormat('d/m/Y',  $row['join_date'])->format('Y-m-d');

        return new Employee([
            "name"              => $row['name'],
            "gender"            => $row['gender'],
            "phone_number"      => $row['phone_number'],
            "email"             => $row['email'],
            "birth_date"        => $birthDate,
            "join_date"         => $joinDate,
            "department_id"     => $departmentId,
            "designation_id"    => $designationId,
            'status'            => ($row['status'] == 'Active' ? 1 : 0)
        ]);
    }

    public function rules(): array
    {
        return [
            "name"              => 'required|string|max:100',
            "gender"            => 'required|in:Male,Female',
            "phone_number"      => 'required|numeric|max_digits:15',
            "email"             => 'required|email|unique:employees,email|distinct',
            "birth_date"        => 'required|date_format:d/m/Y',
            "join_date"         => 'required|date_format:d/m/Y',
            "department_name"   => 'required|exists:departments,name',
            "designation_name"  => 'required|exists:designations,name',
            'status'            => 'required|in:Active,Inactive'
        ];
    }
}
