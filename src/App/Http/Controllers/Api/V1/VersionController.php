<?php

namespace Callmeaf\Version\App\Http\Controllers\Api\V1;

use Callmeaf\Base\App\Http\Controllers\Api\V1\ApiController;
use Callmeaf\Version\App\Http\Resources\Api\V1\VersionResource;
use Callmeaf\Version\App\Models\Version;
use Callmeaf\Version\App\Repo\Contracts\VersionRepoInterface;
use Callmeaf\VersionView\App\Repo\Contracts\VersionViewRepoInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class VersionController extends ApiController implements HasMiddleware
{
    public function __construct(protected VersionRepoInterface $versionRepo)
    {
        parent::__construct($this->versionRepo->config);
    }

    public static function middleware(): array
    {
        return [
           //
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->versionRepo->latest()->search()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return $this->versionRepo->create(data: $this->request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->versionRepo->findById(value: $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return $this->versionRepo->update(id: $id, data: $this->request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->versionRepo->delete(id: $id);
    }

    public function statusUpdate(string $id)
    {
        return $this->versionRepo->update(id: $id, data: $this->request->validated());
    }

    public function typeUpdate(string $id)
    {
        return $this->versionRepo->update(id: $id, data: $this->request->validated());
    }

    public function trashed()
    {
        return $this->versionRepo->trashed()->latest()->search()->paginate();
    }

    public function restore(string $id)
    {
        return $this->versionRepo->restore(id: $id);
    }

    public function forceDestroy(string $id)
    {
        return $this->versionRepo->forceDelete(id: $id);
    }


    public function latest()
    {
        /**
         * @var VersionResource $lastVersion
         */
        $lastVersion = $this->versionRepo->latest()->first();

        if($lastVersion->resource->viewedByUser(user: $this->request->user())) {
            return response()->json(null,Response::HTTP_NOT_MODIFIED);
        }

        return $lastVersion;
    }

    public function confirmView(string $id)
    {
        $version = $this->versionRepo->findById($id);

        $version->resource->confirmViewByUser(user: $this->request->user());

        return response()->json();
    }
}
