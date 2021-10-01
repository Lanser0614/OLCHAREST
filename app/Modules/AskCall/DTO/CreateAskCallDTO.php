<?php

namespace App\Modules\AskCall\DTO;

class CreateAskCallDTO
{
  public  $name;
  public  $phone_number;
 public   $from_time;
 public   $to_time;

 public function __construct($name, $phone_number, $from_time, $to_time)
 {
     $this->name =$name;
     $this->phone_number =$phone_number;
     $this->from_time =$from_time;
     $this->to_time =$to_time;
 }

}