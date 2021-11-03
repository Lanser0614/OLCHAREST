<?php

namespace App\Modules\CustomerComputer\DTO;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RegisterUserDTO extends BaseDTO
{
    public $name;

    public $password;

    public $email;

    public $phone;

    public $safe = true;

    public $device;

    // public function __construct(RegistrationRequest $request)
    // {
    //     parent::__construct($request);
    // }

    public function getDTO(){

        if (isset($this->data['name'])){
            $this->name = $this->data['name'];
        }

        if (isset($this->data['password'])){
            $this->password = bcrypt($this->data['password']);
        }

        if (isset($this->data['email'])){
            $this->email = $this->data['email'];
        }

        if (isset($this->data['phone'])){
            $this->phone = $this->data['phone'];
        }

        if ($this->request->header('User-Agent')){
            $this->device = $this->request->header('User-Agent');
        }

        return $this;
    }

}