<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateDepartmentRequest extends FormRequest
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
        $department = $this->route('department');

        return [
            'name'          => "required|string|max:255|unique:departments,name,$department->id,id",
            'description'   => 'required|string|max:500',
            'is_active'     => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'is_active' => 'status'
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