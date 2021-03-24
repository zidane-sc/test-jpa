<?php

namespace App\Http\Controllers;

use App\Device;
use App\Trending;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function show($id)
    {
        $devices = Device::all();
        $trendings = Trending::where('device_id', $id)->get();
        $values_1 = Trending::where('device_id', $id)->pluck('value_1')->toArray();
        $values_2 = Trending::where('device_id', $id)->pluck('value_2')->toArray();
        $date = Trending::where('device_id', $id)->pluck('datetime')->toArray();
        return view('trending.index', compact('devices', 'trendings', 'values_1', 'values_2', 'date'));
    }
}
