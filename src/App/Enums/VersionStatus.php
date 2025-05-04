<?php

namespace Callmeaf\Version\App\Enums;


use Callmeaf\Base\App\Enums\BaseStatus;

enum VersionStatus: string
{
    case ACTIVE = BaseStatus::ACTIVE->value;
    case INACTIVE = BaseStatus::INACTIVE->value;
    case PENDING = BaseStatus::PENDING->value;
}
