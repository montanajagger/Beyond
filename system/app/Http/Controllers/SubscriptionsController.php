<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SubscriptionsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function list()
    {
        $data['subscriptions'] = DB::table('user_subscriptions')
            ->select('user_subscriptions.id',
                'user_subscriptions.plan_id',
                'user_subscriptions.secretary_id',
                'user_subscriptions.coupon_id',
                'user_subscriptions.start_date',
                'user_subscriptions.end_date',
                'user_subscriptions.status',
                'user_subscriptions.created_at',
                'user_subscriptions.updated_at',
                'user_subscriptions.payment',
                'users.username as clientName')
            ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
            ->paginate();
        $data['secretaries'] = DB::table('users')->where('user_type', 'secretary')->get();

        return view('subscriptions.list', $data);
    }

    public function updateSecretary($subscription_id, $secretary_id) {
        try {
            $updated = DB::table('user_subscriptions')->where('id', $subscription_id)->update(['secretary_id'=> $secretary_id]);

            return response()->json(['success' => 'success updated']);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

    }
}
