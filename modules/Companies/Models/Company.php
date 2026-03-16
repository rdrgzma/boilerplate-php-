<?php

namespace Modules\Companies\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Company extends Model
{
    protected static string $table = 'companies';

    protected static function isTenantModel(): bool
    {
        return false;
    }
}
