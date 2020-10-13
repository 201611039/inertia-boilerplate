<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as Privilege;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Privilege
{
    use HasFactory;
}
