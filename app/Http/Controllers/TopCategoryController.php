<?php

namespace App\Http\Controllers;

use App\Models\TopCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class TopCategoryController extends Controller
{
    public function TopCategory(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);
        $date = $request->date;
        $date = Carbon::make($date)->format('Y-m-d');
        $appId = 1421444;
        $countryId = 1;
        $url = TopCategory::create([
            'date' => $date,
            'appId' => $appId,
            'countryId' => $countryId
        ]);
        $url = $url->getUrl();
        $response = Http::get($url);
        if ($response['status_code'] != 200) return new Response($response->json(), $response['status_code']);
        $data = [];
        foreach ($response['data'] as $key => $category)
        {
            $max = 999999999;
            foreach ($category as $underCategory)
            {
                if ($underCategory[$date] < $max) $max = $underCategory[$date];
            }
            $data[$key] = $max;
        }
        return new Response(['status_code' => 200, 'message' => 'ok','data' => $data]);
    }
}
