<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class RestaurantAPIsController extends Controller
{

    /**
     * Handle an incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesByCountry($id) {
        $states = State::select('id', 'name')->where('country_id', $id)->where('del_status', 'Live')->orderBy('name', 'asc')->get();

        if ($states) {
            return response()->json([
                'success' => true, 'msg' => 'Resource found against the request.', 'data' => $states
            ]);
        } else {
            return response()->json([
                'success' => false, 'msg' => 'No resource found against the request!'
            ]);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByState($id) {
        $cities = City::select('id', 'name')->where('state_id', $id)->where('del_status', 'Live')->orderBy('name', 'asc')->get();

        if ($cities) {
            return response()->json([
                'success' => true, 'msg' => 'Resource found against the request.', 'data' => $cities
            ]);
        } else {
            return response()->json([
                'success' => false, 'msg' => 'No resource found against the request!'
            ]);
        }
    }
    public function alldata($key){

        $data = DB::table('tbl_restaurants')
            ->join('tbl_restaurant_settings_logos','tbl_restaurants.id','=','tbl_restaurant_settings_logos.restaurant_id')
            ->join('tbl_countries','tbl_restaurants.country_id','=','tbl_countries.id')
            ->join('tbl_states','tbl_restaurants.state_id','=','tbl_states.id')
            ->join('tbl_cities','tbl_restaurants.city_id','=','tbl_cities.id')
            ->select('tbl_restaurants.*','tbl_restaurant_settings_logos.logo','tbl_countries.name as countries','tbl_states.name as states','tbl_cities.name as cities')
            ->where('tbl_restaurants.res_api',$key)
            ->first();

        if(isset($data))
        {
            echo json_encode(array(
                'return'=>true,
                'message'=>'Data Found',
                'data'=>$data,
                'logo'=> 'http://10.10.10.100/POS_new/media/restaurant/logos/'.$data->logo
            ));

           // {!! $baseURL.'assets/plugins/jcanvas/dist/jcanvas.js'!!}
        }
        else
        {
            echo json_encode(array(
                'return'=>false,
                'message'=>'Data Not Found Key is not Valid',
                'data'=>'[]'
            ));
        }
    }
    public function customerOnlineOrders($key){
        $res= DB::table('tbl_restaurants')
            ->where('res_api',$key)
            ->first();
        $data = DB::table('tbl_customer_online_orders')
            ->where('restaurant_id',$res->id)
            ->where('del_status', 'Live')
            ->get();
        if(isset($data))
        {
            echo json_encode(array(
                'return'=>true,
                'message'=>'Data Found',
                'data'=>$data
            ));
        }
        else
        {
            echo json_encode(array(
                'return'=>false,
                'message'=>'Data Not Found Key is not Valid',
                'data'=>'[]'
            ));
        }
    }

    public function foodMenus($key){
        $res= DB::table('tbl_restaurants')
            ->where('res_api',$key)
            ->first();
        $data = DB::table('tbl_restaurant_food_menus')
            ->where('restaurant_id',$res->id)
            ->where('del_status', 'Live')
            ->get();
        if(isset($data))
        {
            echo json_encode(array(
                'return'=>true,
                'message'=>'Data Found',
                'data'=>$data
            ));
        }
        else
        {
            echo json_encode(array(
                'return'=>false,
                'message'=>'Data Not Found Key is not Valid',
                'data'=>'[]'
            ));
        }
    }
}
