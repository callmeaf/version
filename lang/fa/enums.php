<?php

use Callmeaf\Version\App\Enums\VersionStatus;
use Callmeaf\Version\App\Enums\VersionType;

return [
    VersionStatus::class => [
        VersionStatus::ACTIVE->name => 'Active',
        VersionStatus::INACTIVE->name => 'InActive',
        VersionStatus::PENDING->name => 'Pending',
    ],
    VersionType::class => [
        //
    ],
];
