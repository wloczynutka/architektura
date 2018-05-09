<?php

namespace Loyality\Domain;

use MyCLabs\Enum\Enum;

class Status extends Enum
{
    const ACTIVE = 1;
    const INACTIVE = 2;
}