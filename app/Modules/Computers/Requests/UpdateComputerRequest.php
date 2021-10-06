<?php

namespace App\Modules\Computers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComputerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string',
            'desc' => 'required|string',
            'name_ru' => 'required|string',
            'desc_ru' => 'required|string',
            'name_uz' => 'required|string',
            'desc_uz' => 'required|string',
            'image' => 'required|string',
            'monofacture_id' => 'required|numeric'
        ];
    }
}
