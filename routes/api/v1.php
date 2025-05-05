<?php

use Illuminate\Support\Facades\Route;

[
    $controllers,
    $prefix,
    $as,
    $middleware,
] = Base::getRouteConfigFromRepo(repo: \Callmeaf\Version\App\Repo\Contracts\VersionRepoInterface::class);

//Route::apiResource($prefix, $controllers['version'])->middleware($middleware);
Route::prefix($prefix)->as($as)->middleware($middleware)->controller($controllers['version'])->group(function () {
    Route::get('/latest','latest');
     Route::prefix('{version}')->group(function () {
         Route::post('/confirm_view','confirmView');
     });
});
