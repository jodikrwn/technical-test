<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employee = $this->route('employee');

        return [
            "name"              => 'required|string|max:100',
            "gender"            => 'required|in:male,female',
            "phone_number"      => 'required|numeric|max_digits:15',
            "email"             => "required|email|unique:employees,email,$employee->id,id",
            "birth_date"        => 'required|date',
            "join_date"         => 'required|date',
            "department_id"     => 'required|exists:departments,id',
            "designation_id"    => 'required|exists:designations,id',
            "is_active"         => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'department_id'     => 'department',
            'designation_id'    => 'designation',
            'is_active'         => 'status'
        ];
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(
            response()->json(
                ['error' => 'Anda tidak memiliki izin untuk melakukan tindakan ini.'],
                403
            )
        );
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                ['error' => $validator->errors()->first()],
                422
            )
        );
    }
}
