<?php

namespace App\Http\ViewComposers;

use App\Models\Topic;
use DB;
use Illuminate\View\View;

class RankComposer
{
    protected $ranks = [];

    /**
     * Create a movie composer.
     *
     * @return void
     */

    public function __construct()
    {
        $topics = Topic::all();
        $select_table = DB::select(
            'select user_id, avg(max_score) as score, count(topic_id) as count_topic
            from ( select user_id, topic_id, max(total) as max_score
                    from topic_user
                    group by user_id, topic_id
                ) as tmp
            group by user_id
            order by score desc;'
        );
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
        $this->ranks = $ranks;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view)
    {
        $view->with('ranks', $this->ranks);
    }
}
