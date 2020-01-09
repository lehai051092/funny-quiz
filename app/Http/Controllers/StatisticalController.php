<?php

namespace App\Http\Controllers;

use App\Notifications\SaveResultExample;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class StatisticalController extends Controller
{
    public function getQuiz()
    {
        $notifications= \App\Notification::all();
        foreach ($notifications as $notification){
            $data=json_decode($notification->data);

        }
        dd($data);
        return view('statistical.list',compact('notifications'));
    }
}
