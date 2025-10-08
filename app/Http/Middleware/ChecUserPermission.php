<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class ChecUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!isset(auth()->user()->id))
            return response()->json(['message' => __('messages.unauthorized')], 401);

        $path = $request->path();
        $userId = auth()->user()->id;

        $pkMenuApi = DB::table('r_usersroles')
            ->join('r_menusroles', 'r_usersroles.fk_role', '=', 'r_menusroles.fk_role')
            ->join('r_menusapis', 'r_menusroles.fk_menu', '=', 'r_menusapis.fk_menu')
            ->join('b_apis', 'r_menusapis.fk_api', '=', 'b_apis.pk_api')
            ->where('r_usersroles.fk_user', $userId)
            ->where('b_apis.api', $path)
            ->exists();

        //return response()->json(['message' => $path], 401);

        if ($pkMenuApi)
            return $next($request);
        else
            return response()->json(['message' => __('messages.error.forbidden')], 403);
    }
}
