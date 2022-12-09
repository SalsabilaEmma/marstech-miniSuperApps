<?php

namespace App\Http\Controllers;

use App\Models\BukaDeposito;
use App\Models\Deposito;
use Illuminate\Http\Request;

class BukaDepositoController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        $title = 'Buka Deposito';
        return view('user.buka-deposito', compact('title'));
    }

    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'Buka Deposito';
        $data_deposito = BukaDeposito::latest()->get();
        return view('admin.deposito.list', compact('data_deposito','title'));
    }

    public function detail($id)
    {
        $title = 'Buka Deposito';
        $data_deposito = BukaDeposito::findOrFail($id);
        return view('admin.deposito.detail', compact('data_deposito', 'title'));
    }

    public function destroy($id)
    {
        $data_deposito = BukaDeposito::findOrfail($id);
        $data_deposito->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }

}
