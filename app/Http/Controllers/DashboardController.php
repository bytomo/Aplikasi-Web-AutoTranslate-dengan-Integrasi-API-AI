<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $total = Translation::where('user_id', $userId)->count();
        $today = Translation::where('user_id', $userId)
            ->whereDate('created_at', now()->toDateString())
            ->count();
        $recent = Translation::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('total','today','recent'));
    }
}
