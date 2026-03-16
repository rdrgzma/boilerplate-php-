<?php

namespace Modules\Finance\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Transaction extends Model
{
    protected static string $table = 'transactions';
}
