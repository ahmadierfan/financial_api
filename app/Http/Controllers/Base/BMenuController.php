<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SBellController;

use Morilog\Jalali\Jalalian;

use Illuminate\Support\Facades\DB;

use App\Models\b_menu;

class BMenuController extends Controller
{
    function index()
    {
        $data = b_menu::get();

        return $data;
    }


    function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function createMetabaseJwt($dashboardId, $params = [], $secretKey)
    {
        $header = [
            "alg" => "HS256",
            "typ" => "JWT"
        ];

        $payload = [
            "resource" => ["dashboard" => $dashboardId],
            "params" => $params,
            "exp" => time() + 600 // اعتبار ۱۰ دقیقه
        ];

        $base64UrlHeader = $this->base64UrlEncode(json_encode($header));
        $base64UrlPayload = $this->base64UrlEncode(json_encode($payload));

        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $secretKey, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);

        return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
    }




    function authUser(SBellController $SBell)
    {
        $menus = [];

        if (isset(auth()->user()->id)) {
            $userId = auth()->user()->id;

            $menus = DB::table('b_menus')
                ->select(
                    'b_menus.pk_menu',
                    'b_menus.fk_menu',
                    'b_menus.fk_system',
                    'b_menus.fk_apiget',
                    'b_menus.fk_apidestroy',
                    'b_menus.fk_modulemenu',
                    'b_menus.menulevel',
                    'b_menus.menu',
                    'b_menus.menusec',
                    'b_menus.primarykey',
                    'b_menus.customprob',
                    'b_menus.component',
                    'b_menus.secondcomponent',
                    'b_menus.icon',
                    'b_menus.ordernumber',
                    'r_menusroles.deleteaccess',
                    'r_menusroles.editaccess',
                    'r_menusroles.printaccess',
                    'apigets.api AS apiget',
                    'apicreates.api AS apicreate',
                    'apiupdates.api AS apiupdate',
                    'apidestroys.api AS apidestroy',
                    //'listmenus.pk_menu AS listmenu_pk',
                )
                ->distinct()
                ->join('r_usersroles', function ($join) use ($userId) {
                    $join->on('r_usersroles.fk_user', '=', DB::raw($userId));
                })
                ->join('r_menusroles', function ($join) {
                    $join->on('r_menusroles.fk_role', '=', 'r_usersroles.fk_role')
                        ->on('b_menus.pk_menu', '=', 'r_menusroles.fk_menu');
                })
                //->leftJoin('b_menus as listmenus', 'b_menus.pk_menu', '=', 'listmenus.fk_modulemenu')
                ->leftJoin('b_apis as apigets', 'b_menus.fk_apiget', '=', 'apigets.pk_api')
                ->leftJoin('b_apis as apicreates', 'b_menus.fk_apicreate', '=', 'apicreates.pk_api')
                ->leftJoin('b_apis as apiupdates', 'b_menus.fk_apiupdate', '=', 'apiupdates.pk_api')
                ->leftJoin('b_apis as apidestroys', 'b_menus.fk_apidestroy', '=', 'apidestroys.pk_api')
                ->where('b_menus.isenable', 1)
                ->orderBy('ordernumber')
                ->get();

            $relatedListMenus = DB::table('b_menus')
                ->select('pk_menu', 'menu', 'icon', 'fk_modulemenu', 'component')
                ->whereIn('fk_modulemenu', $menus->pluck('pk_menu'))
                ->where('isenable', 1)
                ->orderBy('ordernumber', 'DESC')
                ->groupBy('pk_menu', 'menu', 'icon', 'fk_modulemenu', 'component')
                ->get();

            foreach ($menus as $menu) {
                foreach ($relatedListMenus as $listmenu) {
                    if ($menu->pk_menu == $listmenu->fk_modulemenu) {
                        $menu->listmenu_pk = $listmenu->pk_menu;
                    }
                }
            }
        }

        $bells = $SBell->showBellForUserInCompany();

        $res = [
            "bells" => $bells,
            "user" => auth()->user(),
            "menus" => $menus,
            "todayGeo" => date("Y/m/d"),
            "todayJalali" => Jalalian::now()->format('Y/m/d')
        ];

        return $res;
    }
}
