<?php

namespace Callmeaf\Version\App\Models;

use Callmeaf\Base\App\Models\BaseModel;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Callmeaf\Base\App\Traits\Model\HasSearch;
use Callmeaf\VersionView\App\Repo\Contracts\VersionViewRepoInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Version extends BaseModel
{
    use HasDate,HasSearch;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'content'
    ];

    public static function configKey(): string
    {
        return 'callmeaf-version';
    }

    protected function casts(): array
    {
        return [
            ...(self::config()['enums'] ?? []),
        ];
    }

    public function usersViews(): HasMany
    {
        /**
         * @var VersionViewRepoInterface $versionSeenRepo
         */
        $versionViewRepo = app(VersionViewRepoInterface::class);
        return $this->hasMany($versionViewRepo->getModel()::class);
    }

    public function viewedByUser($user = null): bool
    {
        $user ??= Auth::user();

        return $this->usersViews()->where('user_id',$user->id)->exists();
    }

    public function confirmViewByUser($user = null): void
    {
        $user ??= Auth::user();

        $this->usersViews()->create([
            'user_id' => $user->id,
        ]);
    }

    public function searchParams(): array
    {
        return [
            [
                'id' => 'id',
            ],
            [
                'created_from' => 'created_at',
                'created_to' => 'created_at'
            ]
        ];
    }
}
