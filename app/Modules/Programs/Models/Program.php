<?php

namespace App\Modules\Programs\Models;

use App\Modules\Programs\database\factories\ProgramFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;


    protected static function newFactory(): \Illuminate\Database\Eloquent\Factories\Factory
    {
        return ProgramFactory::new();
    }

    protected $table = 'programs_table';

    protected $fillable = ['name', 'parent_id'];
    
    protected $hidden = ['parent_id'];

    public function childCategories()
    {
        return $this->hasMany(Program::class,'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Program::class,'parent_id')->with('childCategories');
    }



}