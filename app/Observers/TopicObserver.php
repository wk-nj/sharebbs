<?php

namespace App\Observers;

use App\Jobs\TranslateSlug;
use App\Models\Topic;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        if($topic->body) {
            $topic->body = clean($topic->body, 'user_topic_body');
            $topic->excerpt = Str::limit($topic->body);
        }
    }

    public function saved(Topic $topic)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $topic->slug) {
            Log::info('topic saving', $topic->toArray());
            TranslateSlug::dispatch($topic);
        }
    }

    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}
