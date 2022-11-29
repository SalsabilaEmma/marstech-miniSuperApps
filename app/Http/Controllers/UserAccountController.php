<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    /**  Admin Side -------------------------------------------------------------------------------------------------- */
    public function list()
    {
        $title = 'User Account';
        $data_user = UserAccount::latest()->get();
        // $data_user = Deposito::with('data_user')->get();
        return view('admin.user-account.list', compact('data_user','title'));
    }
    public function edit($id)
    {
        $title = 'User Account';
        $data_user = UserAccount::find($id);
        return view('admin.user-account.edit', compact('data_user','title'));
    }
}
