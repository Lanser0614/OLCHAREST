<?php

namespace App\Modules\ComputerImage\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BaseApiController;

class ComputerImageController extends BaseApiController
{

    public function index()
    {
    # code...
    }


    public function show($id)
    {
    # code...
    }


    public function update(Request $request,$id)
    {
    return $request->all();
    }


    public function store(Request $request)
    {
    return $request->all();
    }


    public function destroy($id)
    {
    # code...
    }
}
