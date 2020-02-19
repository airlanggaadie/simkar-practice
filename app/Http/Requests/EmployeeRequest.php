<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'email' => 'required',
            'phonenumber' => 'required|integer',
            'bornday' => 'required',
            'positions_id' => 'required|exists:positions,id',
            'joined_at' => 'required',
            'status_id' => 'required|exists:status,id',
            'educations_id' => 'required|exists:educations,id'
        ];
    }
}
