<?php

namespace Modules\Users\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class User extends Model
{
    protected static string $table = 'users';
}
