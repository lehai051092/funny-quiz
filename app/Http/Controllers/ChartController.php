<?php

namespace App\Http\Controllers;

use App\Charts\PointChart;
use App\Notification;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {   $scoreTotal=0;
        $usersChart = new PointChart();
        $notifications=Notification::all();
        foreach ($notifications as $notification){
           $data=json_decode($notification->data);
            $scoreTotal+=$data->score;
        }
        $score=floor($scoreTotal/count($notifications));

        $usersChart->labels(['Good', 'Not Good']);
        $usersChart->dataset('Users by trimester', 'pie', [$score, (100-$score)])
            ->color("red")
            ->backgroundcolor(["white","green"]);
        return view('admins.statistics.index', compact('usersChart'));
    }

}
