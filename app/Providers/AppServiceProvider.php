<?php

namespace App\Providers;

use App\Category;
use App\Http\Repositories\AnswerRepositoryInterface;
use App\Http\Repositories\CategoryRepositoryInterface;
use App\Http\Repositories\Eloquent\AnswerRepositoryEloquent;
use App\Http\Repositories\Eloquent\CategoryRepositoryEloquent;
use App\Http\Repositories\Eloquent\QuestionRepositoryEloquent;
use App\Http\Repositories\Eloquent\QuizRepositoryEloquent;
use App\Http\Repositories\Eloquent\TestRepositoryEloquent;
use App\Http\Repositories\Eloquent\UserRepositoryEloquent;
use App\Http\Repositories\QuestionRepositoryInterface;
use App\Http\Repositories\QuizRepositoryInterface;
use App\Http\Repositories\TestRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\Impl\AnswerServiceImpl;
use App\Http\Services\Impl\CategoryServiceImpl;
use App\Http\Services\Impl\QuestionServiceImpl;
use App\Http\Services\Impl\QuizServiceImpl;
use App\Http\Services\Impl\TestServiceImpl;
use App\Http\Services\Impl\UserServiceImpl;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use App\Http\Services\TestServiceInterface;
use App\Http\Services\UserServiceInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepositoryEloquent::class);
        $this->app->singleton(CategoryServiceInteface::class, CategoryServiceImpl::class);
        $this->app->singleton(TestRepositoryInterface::class,TestRepositoryEloquent::class);
        $this->app->singleton(TestServiceInterface::class,TestServiceImpl::class);
        $this->app->singleton(QuizRepositoryInterface::class,QuizRepositoryEloquent::class);
        $this->app->singleton(QuizServiceInterface::class,QuizServiceImpl::class);
        $this->app->singleton(QuestionRepositoryInterface::class,QuestionRepositoryEloquent::class);
        $this->app->singleton(QuestionServiceInterface::class,QuestionServiceImpl::class);
        $this->app->singleton(AnswerRepositoryInterface::class,AnswerRepositoryEloquent::class);
        $this->app->singleton(AnswerServiceInterface::class,AnswerServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
//    public function boot()
//    {
//        $categories = Category::all();
//        View::share('categories',$categories);
//    }
}
