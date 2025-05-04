<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\Version\App\Models\Version::class,
    'route_key_name' => 'id',
    'repo' => \Callmeaf\Version\App\Repo\V1\VersionRepo::class,
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\Version\App\Http\Resources\Api\V1\VersionResource::class,
            'resource_collection' => \Callmeaf\Version\App\Http\Resources\Api\V1\VersionCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\Version\App\Http\Resources\Web\V1\VersionResource::class,
            'resource_collection' => \Callmeaf\Version\App\Http\Resources\Web\V1\VersionCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\Version\App\Http\Resources\Admin\V1\VersionResource::class,
            'resource_collection' => \Callmeaf\Version\App\Http\Resources\Admin\V1\VersionCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\Version\App\Events\Api\V1\VersionIndexed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionCreated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionShowed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionDeleted::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Api\V1\VersionTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\Version\App\Events\Web\V1\VersionIndexed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionCreated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionShowed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionDeleted::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Web\V1\VersionTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\Version\App\Events\Admin\V1\VersionIndexed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionCreated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionShowed::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionDeleted::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Version\App\Events\Admin\V1\VersionTypeUpdated::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionIndexRequest::class,
            'store' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionStoreRequest::class,
            'show' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionShowRequest::class,
            'update' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionUpdateRequest::class,
            'destroy' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Version\App\Http\Requests\Api\V1\VersionTypeUpdateRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionIndexRequest::class,
            'create' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionCreateRequest::class,
            'store' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionStoreRequest::class,
            'show' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionShowRequest::class,
            'edit' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionEditRequest::class,
            'update' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionUpdateRequest::class,
            'destroy' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Version\App\Http\Requests\Web\V1\VersionTypeUpdateRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionIndexRequest::class,
            'store' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionStoreRequest::class,
            'show' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionShowRequest::class,
            'update' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionUpdateRequest::class,
            'destroy' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Version\App\Http\Requests\Admin\V1\VersionTypeUpdateRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'version' => \Callmeaf\Version\App\Http\Controllers\Api\V1\VersionController::class,
        ],
        RequestType::WEB->value => [
            'version' => \Callmeaf\Version\App\Http\Controllers\Web\V1\VersionController::class,
        ],
        RequestType::ADMIN->value => [
            'version' => \Callmeaf\Version\App\Http\Controllers\Admin\V1\VersionController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'versions',
            'as' => 'versions.',
            'middleware' => [
                'auth:sanctum'
            ],
        ],
        RequestType::WEB->value => [
            'prefix' => 'versions',
            'as' => 'versions.',
            'middleware' => [],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'versions',
            'as' => 'versions.',
            'middleware' => [
                'auth:sanctum',
//                'role:' . \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value,
            ],
        ],
    ],
    'enums' => [
         'status' => \Callmeaf\Version\App\Enums\VersionStatus::class,
         'type' => \Callmeaf\Version\App\Enums\VersionType::class,
    ],
     'exports' => [
        RequestType::API->value => [
            'excel' => \Callmeaf\Version\App\Exports\Api\V1\VersionsExport::class,
        ],
        RequestType::WEB->value => [
            'excel' => \Callmeaf\Version\App\Exports\Web\V1\VersionsExport::class,
        ],
        RequestType::ADMIN->value => [
            'excel' => \Callmeaf\Version\App\Exports\Admin\V1\VersionsExport::class,
        ],
     ],
     'imports' => [
         RequestType::API->value => [
             'excel' => \Callmeaf\Version\App\Imports\Api\V1\VersionsImport::class,
         ],
         RequestType::WEB->value => [
             'excel' => \Callmeaf\Version\App\Imports\Web\V1\VersionsImport::class,
         ],
         RequestType::ADMIN->value => [
             'excel' => \Callmeaf\Version\App\Imports\Admin\V1\VersionsImport::class,
         ],
     ],
];
