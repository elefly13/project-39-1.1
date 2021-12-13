<?php

declare(strict_types = 1);

namespace App\Charts;
use Illuminate\Support\Facades\Auth;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Order;
class SampleChart extends BaseChart
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
        $data_year=[];
        $asse_x=[];
        for ($i = 0; $i <= 4; $i++) {
            $temp =count( Order::whereYear('created_at', ($year_now - $i))->whereHas('dishes',function($q ) use ($user) {
                $q->where('user_id', $user['id']);
            })->get()
        );
            array_push($asse_x, ($year_now - $i));
           array_push($data_year, $temp);
        };
    
        return Chartisan::build()
            ->labels( $asse_x)
            ->dataset('Sample 2', $data_year);
    }
}