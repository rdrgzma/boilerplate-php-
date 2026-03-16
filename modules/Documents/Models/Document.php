<?php

namespace Modules\Documents\Models;

use Core\Model;
use AllowDynamicProperties;

#[AllowDynamicProperties]
class Document extends Model
{
    protected static string $table = 'documents';
}
