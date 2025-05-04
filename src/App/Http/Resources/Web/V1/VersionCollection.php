<?php

namespace Callmeaf\Version\App\Http\Resources\Web\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<VersionResource>
 */
class VersionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, VersionResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
