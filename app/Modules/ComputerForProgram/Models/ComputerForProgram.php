<?php

namespace App\Modules\ComputerForProgram\Models;

use App\Modules\ComputerForProgram\database\factories\ComputerForProgramFactory;
use App\Modules\Programs\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerForProgram extends Model
{
    use HasFactory;

    protected $table = 'computer_for_program';
    protected $fillable = ['computer_id','program_id'];

    protected static function newFactory(): ComputerForProgramFactory
    {
        return ComputerForProgramFactory::new();
    }

    public function program(){
        return $this->HasOne(Program::class, 'id', 'program_id');
    }

}