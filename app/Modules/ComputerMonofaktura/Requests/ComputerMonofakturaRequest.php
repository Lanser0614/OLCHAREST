<?php


namespace App\Modules\ComputerMonofaktura\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerMonofakturaRequest extends FormRequest
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
            'image' => 'required'
        ];
    }
}
