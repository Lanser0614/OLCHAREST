<?php


namespace App\Modules\EmailFeedback\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class EmailFeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'description' => $this->description
        ];
    }
}
