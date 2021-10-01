<?php

namespace App\Modules\ComputerForProgram\Resources;

use App\Modules\Programs\Resources\ProgramResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerProgramResource extends JsonResource
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
            'id' => $this->id,
            'computer_id' => $this->computer_id,
            'program_id' => $this->program_id,
            'parent_id' => $this->program->parent_id,
            'name' => $this->program->name,
           //'program' => ProgramResource::collection($this->whenLoaded('program'))
        ];
    }
}
