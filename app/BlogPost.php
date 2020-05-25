<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
  //Table name
  protected $table = 'blog_posts';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}
