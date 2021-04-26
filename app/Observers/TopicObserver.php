<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Models\Topic;
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

        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $topic->slug) {
            $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
        }
    }

    public function updating(Topic $topic)
    {
        //
    }
}
