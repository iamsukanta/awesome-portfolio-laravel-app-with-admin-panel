<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
  //Table name
  protected $table = 'about_mes';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}
