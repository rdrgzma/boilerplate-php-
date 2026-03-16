<?php

namespace Modules\Sales\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Sale extends Model
{
    protected static string $table = 'sales';
}
