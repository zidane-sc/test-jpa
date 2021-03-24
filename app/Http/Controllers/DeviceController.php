<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('settings.device.index', compact('devices'));
    }

    public function create()
    {
        $devices = Device::all();
        return view('settings.device.create',  compact('devices'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'code'   => 'required|unique:devices,code',
            'name'   => 'required|min:3',
            'status' => 'required|in:0,1',
        ]);

        $device = new Device();
        $device->code = $validateData['code'];
        $device->name = $validateData['name'];
        $device->status = $validateData['status'];

        if ($device->save()){
            $info = "success";
            $message = "The device add successfully";
        }

        return redirect(route('devices.index'))->with([$info => $message]);
    }

    public function edit(Device $device)
    {
        $devices = Device::all();
        return view('settings.device.edit', compact('device', 'devices'));
    }

    public function update(Request $request, Device $device)
    {
        $validateData = $request->validate([
            'code'   => 'required|unique:devices,code,'.$device->id,
            'name'   => 'required|min:3',
            'status' => 'required|in:0,1',
        ]);

        if (Device::where('id', $device->id)->update($validateData)){
            $info = "success";
            $message = "The device edit successfully";
        }

        return redirect()->route('devices.index')->with([$info => $message]);
    }
    
    public function destroy(Device $device)
    {
        if ($device->delete()){
            $info = "success";
            $message = "The device remove successfully";
        }

        return redirect()->route('devices.index')->with([$info => $message]);
    }

    public function set($id)
    {
        $devices = Device::all();
        $setDevice = Device::findOrFail($id);
        return view('settings.device.index', compact('setDevice', 'devices'));
    }
}
