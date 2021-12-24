<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    use HasFactory;
    /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
      'user_id',
      'project_id',
      'organization_id',
      'project_id',
  ];
}
