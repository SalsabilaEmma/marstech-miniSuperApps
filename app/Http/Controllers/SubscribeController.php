<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        Subscribe::create([
            'email' => $request->email,
        ]);
        return redirect()->back()->with(['success' => 'Berhasil Subscribe!']);
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Subscribe';
        $data_subscribe = Subscribe::latest()->get();
        return view('admin.subscribe.list', compact('data_subscribe','title'));
    }
}
