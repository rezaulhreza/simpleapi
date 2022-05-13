<?php

namespace App\Http\Controllers;


use App\Services\CovidStatisticService;
use Carbon\Carbon;

class CovidStatisticsController extends Controller
{
    public function index(CovidStatisticService $covidStatisticService) {
        $today = Carbon::now()->toDateString();
        
        $confirmedCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('uk', 'confirmed');
        $recoveredCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('uk', 'recovered');
        $deadCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('uk', 'deaths');

        return response()->json(
            [
            'today' => $today,
            'confirmedCovidCasesUntilToday' => $confirmedCovidCasesUntilToday,
            'recoveredCovidCasesUntilToday' => $recoveredCovidCasesUntilToday,
            'deadCovidCasesUntilToday' => $deadCovidCasesUntilToday,
        ]);
    }
}