<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FormTicketRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'faculty'     => 'required',
            'department'     => 'required',
            'teacher'     => ' required',
            'student'     => 'required ',
            'email'     => 'required ',
            'category'     => ' ',
            'type'     => 'required',
            'priority'     => 'required',
            'message'     => ' ',
        ];
    }
}
