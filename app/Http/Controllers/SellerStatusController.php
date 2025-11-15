<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerStatusController extends Controller
{
    public function pending()
    {
        return view('auth.seller-pending'); 
    }

    public function rejected()
    {
        return view('auth.seller-rejected');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        if ($user->isSeller() && $user->status === 'rejected') {
            $user->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('status', 'Akun Anda telah berhasil dihapus.');
        }

        return redirect()->back();
    }
}
