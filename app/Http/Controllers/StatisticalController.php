<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Notifications\SaveResultExample;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StatisticalController extends Controller
{
    public function getQuiz()
    {
        $notifications = DB::table('notifications')->where('notifiable_id','=', Auth::user()->id)->get();
        $quizzesUser = [];
        foreach ($notifications as $notification){
            $data=json_decode($notification->data);
            array_push($quizzesUser,  Quiz::find($data->listQuestion[0]->quiz_id));
        }
        return view('statistical.list',compact('notifications', 'quizzesUser' ));
    }

    public function findDetailQuizUser($id) {
        $quiz = Quiz::findOrFail($id);

        return view('statistical.detail', compact('quiz'));
    }
}
