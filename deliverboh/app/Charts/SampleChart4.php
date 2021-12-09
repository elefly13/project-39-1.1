<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class SampleChart4 extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
       
        $data_month=[];
        $year_now=now()->year;
        $user = Auth::user();
        $asse_x=[];
        $sum_array=[];
        for ($i = 1; $i <= 12; $i++) {
            $temp = Order::whereMonth('created_at', $i)->whereYear('created_at', $year_now )->whereHas('dishes',function($q ) use ($user) {
                $q->where('user_id', $user['id']);
            })->get();
            $sum=0;
            for ($j = 0; $j < count($temp); $j++){
                $sum=$temp[$j]['total']+$sum;
            };
            
            array_push($asse_x, ( $i));
           array_push($sum_array, $sum);
        };

        return Chartisan::build()
            ->labels( $asse_x)
            ->dataset('Sample', $sum_array);
            
    }
}