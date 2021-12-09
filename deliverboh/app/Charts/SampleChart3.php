<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Order;
class SampleChart3 extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $user = Auth::user();
       
        $year_now=now()->year;
        $asse_x=[];
        $sum_array=[];
        for ($i = 0; $i <= 4; $i++) {
            $temp =Order::whereYear('created_at', ($year_now - $i))->whereHas('dishes',function($q ) use ($user) {
                $q->where('user_id', $user['id']);
            })->get();
            $sum=0;
        for ($j = 0; $j < count($temp); $j++){
          $sum=$temp[$j]['total']+$sum;
      };
            array_push($asse_x, ($year_now - $i));
           array_push($sum_array, $sum);
        };
    
        return Chartisan::build()
            ->labels( $asse_x)
            ->dataset('Sample 2', $sum_array);
    }
}