<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->bind(
            \App\Repositories\Topic\TopicRepositoryInterface::class,
            \App\Repositories\Topic\TopicRepository::class
        );
        $this->app->bind(
            \App\Repositories\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Question\QuestionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Answer\AnswerRepository::class
        );
    }
}
