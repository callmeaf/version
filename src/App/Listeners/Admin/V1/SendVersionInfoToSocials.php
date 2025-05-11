<?php

namespace Callmeaf\Version\App\Listeners\Admin\V1;

use Callmeaf\Social\App\Repo\Contracts\SocialRepoInterface;
use Callmeaf\SocialBot\App\Models\SocialBot;
use Callmeaf\Version\App\Events\Admin\V1\VersionCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVersionInfoToSocials implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the name of the listener's queue.
     */
    public function viaQueue(): string
    {
        return 'socials';
    }

    /**
     * Handle the event.
     */
    public function handle(VersionCreated $event): void
    {
        $version = $event->version;
        /**
         * @var SocialRepoInterface $socialRepo
         */
        $socialRepo = app(SocialRepoInterface::class);

        $socialRepo->getQuery()->whereHas('bots',fn(Builder $query) => $query->active())->chunkById(100,function(Collection $collection) use ($socialRepo,$version) {
            foreach ($collection as $social) {
                foreach ($social->bots as $bot) {
                    $socialRepo->sendMessage(
                        message: $this->versionInfoMessage(versionId: $version->id,socialBot: $bot),
                        socialType: $social->type,
                        socialBotConfig: $bot,
                    );
                }
            }
        });
    }

    private function versionInfoMessage(string $versionId,SocialBot $socialBot): string
    {
        $footerText = $socialBot->footerText ?? '';
        return "✅ Application has been successfully updated to version: $versionId. $footerText";
    }
}
