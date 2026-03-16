<?php

namespace Modules\Settings\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Setting extends Model
{
    protected static string $table = 'settings';
}
