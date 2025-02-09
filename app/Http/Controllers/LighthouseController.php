<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class LighthouseController extends Controller
{
    public function testPerformance(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'platform' => 'required|in:mobile,desktop',
        ]);

        $strategy = ucfirst($request->platform);
        $apiUrl = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url={$request->url}&strategy={$strategy}";

        $response = Http::get($apiUrl);
        $data = $response->json();

        return response()->json([
            'performance_score' => $data['lighthouseResult']['categories']['performance']['score'] * 100
        ]);
    }
}

