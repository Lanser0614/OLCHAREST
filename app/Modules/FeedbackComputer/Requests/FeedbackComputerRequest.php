<?php



namespace App\Modules\FeedbackComputer\Requests;



use Illuminate\Foundation\Http\FormRequest;

class FeedbackComputerRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'title_oz' => 'required',
            'description_oz' => 'required',
            'title_uz' => 'required',
            'description_uz' => 'required',
            'title_ru' => 'required',
            'description_ru' => 'required',
        ];
    }
}
