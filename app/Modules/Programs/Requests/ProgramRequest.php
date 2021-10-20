<?php


namespace App\Modules\Programs\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'name_ru' => 'required',
            'name_uz' => 'required',
            'name_oz' => 'required', 
            'image' => ''   
        ];
    }
}
