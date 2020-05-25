<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
  //Table name
  protected $table = 'portfolios';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}
