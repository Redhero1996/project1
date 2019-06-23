<?php

namespace App\Repositories\Topic;

use App\Repositories\BaseRepository as BaseRepository;
use DB;
use App\Models\Topic;

/**
 *
 */
class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
    public function model()
    {
        return \App\Models\Topic::class;
    }

    public function rank()
    {
        $ranks = [];
        $select_table = DB::select(
            'select user_id, avg(max_score) as score, count(topic_id) as count_topic
            from ( select user_id, topic_id, max(total) as max_score
                    from topic_user
                    group by user_id, topic_id
                ) as tmp
            group by user_id
            order by score desc;'
        );
        $topics = $this->getData(['users'], [], ['id']);
        foreach ($select_table as $key => $select) {
            foreach ($topics as $topic) {
                foreach ($topic->users as $user) {
                    if ($select->user_id == $user->id) {
                        $ranks[$key]['username'] = $user->name;
                        $ranks[$key]['avatar'] = $user->avatar;
                        $ranks[$key]['total'] = $select->score;
                        $ranks[$key]['count'] = $select->count_topic;
                    }
                }
            }
        }
        return $ranks;
    }
}
