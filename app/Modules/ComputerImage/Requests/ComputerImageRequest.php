<?php

namespace App\Modules\ComputerImage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerImageRequest extends FormRequest
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
            'computer_id' => 'required',
            // dd($this->computer_id),
            'image' => 'required',
        ];
    }

}
