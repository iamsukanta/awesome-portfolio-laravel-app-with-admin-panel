<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
  //Table name
  protected $table = 'resumes';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}
