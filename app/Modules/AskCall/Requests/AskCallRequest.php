<?php

namespace App\Modules\AskCall\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskCallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone_number' => 'required',
            'from_time' => 'required|date_format:H:i:s',
            'to_time' => 'required|date_format:H:i:s'
        ];
    }
}
