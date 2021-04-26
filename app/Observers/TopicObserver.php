<?php

namespace App\Observers;

use App\Models\Topic;
use Illuminate\Support\Str;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        if($topic->body) {
            $topic->excerpt = Str::limit($topic->body);
        }
    }

    public function updating(Topic $topic)
    {
        //
    }
}
