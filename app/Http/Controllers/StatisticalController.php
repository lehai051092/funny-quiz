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
        $dataNotification=[];

        foreach ($notifications as $key => $notification){
            $data=json_decode($notification->data);
            array_push($quizzesUser,  Quiz::find($data->listQuestion[$key]->quiz_id));
        }
        return view('statistical.list',compact('notifications', 'quizzesUser' ));
    }

    public function findDetailQuizUser($uid) {
        $notifications=Notification::where('uid','=',$uid)->get();
        $notification=$notifications[0];
        $data=json_decode($notification->data);
        return view('statistical.detail', compact( 'notification','data'));
    }
}
