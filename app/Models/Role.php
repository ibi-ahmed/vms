<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public const IS_CONTRACTOR = 1;
    public const IS_SECURITY = 2;
    public const IS_STAFF = 3;
    public const IS_ADMIN = 4;
    public const IS_SUPER = 5;
}
