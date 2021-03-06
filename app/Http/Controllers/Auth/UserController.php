<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventBoothType;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        $user = ($request->user());
        foreach ($user->events as $e) {
            foreach ($e->booth_purchases as $p) {
                $p->user;
                try {
                    // $p->j = $p->type->id;
                    $p->typex = EventBoothType::find($p->type['id']);
                } catch (\Exception $e) {
                    $p->typex = null;
                }
            };
        };
        return $user;
    }
}