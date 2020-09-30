<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function dashboardModern()
    {
        $data = [
            'total_clients' => \DB::table('users')->where('user_type', 'customer')->count(),
            'total_active_clients' => \DB::table('users')->where('user_type', 'customer')->where('status', 1)->count(),
            'total_secretaries' => \DB::table('users')->where('user_type', 'secretary')->count(),
            'total_income' => \DB::table('orders')->sum('amount'),
        ];
        return view('/pages/dashboard-modern', $data);
    }

    public function dashboardEcommerce()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }

    public function dashboardAnalytics()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
    }
}
