<?php

namespace Modules\Appointments\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Appointment extends Model
{
    protected static string $table = 'appointments';
}
