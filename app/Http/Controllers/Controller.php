<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = Tabungan::all();
        return view('user.index', compact('data'));
    }
    public function indexSimulasiKredit()
    {
        return view('user.simulasi-kredit');
    }

    // Admin ------------------------------------------------------------------
    public function try()
    {
        return view('try');
    }

    public function indexAdmin()
    {
        return view('admin.index');
    }

    // User Login -------------------------------------------------------------

    public function indexUser()
    {
        return view('user-login.dashboard');
    }
}
