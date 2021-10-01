<?php

namespace App\Modules\ComputerForProgram\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerForProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'computer_id' => 'required',
            'program_id' => 'required'
        ];
    }
}
