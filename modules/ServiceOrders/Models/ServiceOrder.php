<?php

namespace Modules\ServiceOrders\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class ServiceOrder extends Model
{
    protected static string $table = 'service_orders';
}
