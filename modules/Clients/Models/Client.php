<?php

namespace Modules\Clients\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Client extends Model
{
    protected static string $table = 'clients';
}
