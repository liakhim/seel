<?php

namespace App\Observers;

use App\Models\Post;

class CampaignStatusObserver
{
    private function checkAndChangeCampaignStatus($post): void
    {
        if ($post->campaign()->posts()->where('status', Post::STATUS_ACTIVE)->count() > 0) {
            $post->campaign()->update([
                'status' => Post::STATUS_ACTIVE
            ]);
        }
    }
    public function created(Post $post)
    {
        $this->checkAndChangeCampaignStatus($post);
    }

    public function updated(Post $post)
    {
        $this->checkAndChangeCampaignStatus($post);
    }

    public function deleted(Post $post)
    {
        $this->checkAndChangeCampaignStatus($post);
    }
}
