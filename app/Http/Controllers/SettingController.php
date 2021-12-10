<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index()
    {
        return view('settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $keys = ['site_title', 'tagline'];

        foreach($keys as $key) {
            if($request->has($key)) {
                Setting::set($key, $request->$key);
            }
        }
        
        return back()->with('status', 'Records have been updated');
    }
}
