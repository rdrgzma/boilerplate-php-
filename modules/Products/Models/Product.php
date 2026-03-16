<?php

namespace Modules\Products\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Product extends Model
{
    protected static string $table = 'products';
}
