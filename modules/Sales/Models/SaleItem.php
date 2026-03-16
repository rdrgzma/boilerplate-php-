<?php

namespace Modules\Sales\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class SaleItem extends Model
{
    protected static string $table = 'sale_items';
}
