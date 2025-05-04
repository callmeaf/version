<?php

namespace Callmeaf\Version\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\Version\App\Models\Version;
use Callmeaf\Version\App\Http\Resources\Api\V1\VersionCollection;
use Callmeaf\Version\App\Http\Resources\Api\V1\VersionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @extends BaseRepoInterface<Version,VersionResource,VersionCollection>
 */
interface VersionRepoInterface extends BaseRepoInterface
{

}
