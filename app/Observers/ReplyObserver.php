<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Topic;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply)
    {
//        $reply->topic->increment('reply_count', 1);
        $reply->topic->updateReplyCount();
        if(!app()->runningInConsole()) {
            $reply->topic->user->notify(new TopicReplied($reply));
        }
    }

    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
}
