<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   /**
   * Массово присваиваемые атрибуты.
   *
   * @var array
   */
  protected $fillable = ['name'];
}
