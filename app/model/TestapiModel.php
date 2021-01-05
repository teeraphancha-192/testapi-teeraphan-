<?php

namespace App\model;
use DB;
use Illuminate\Database\Eloquent\Model;

class TestapiModel extends Model {
   // protected $table = 'tbl_provinces';

	// public static function ininsert($data){
	
	// 	$insert = DB::table('users')->insertGetId($data);
	// 	return $insert;	
		
	// }

	// public static function insertpro($data){

	// 	$proinn = DB::table('tbl_provinces')->insertGetId($data);
	// 	return $proinn;
	// }

	// public static function search($request){
	// 	$searchtable = DB::table('province')
	// 					->where('PROVINCE_NAME','like','%'.trim($request).'%')
	// 	return $searchtable;
	// }

	// public static function loginmodel($data){

	// 	$uu = DB::table('users')->insertGetId($data);
	// 	return $uu;
	// }

	// public static function UpdateM($data){
	// 	echo "LAXYLOXY";die();
	// 	$UD = DB::table('tbl_provinces')->insertGetId($data)->update(['province_id'] => '85');
	// 	return $UD;
	// }

	// public static function del($request){
	// 	// print_r($request);die();
	// 	// echo "EZEZEZ";die();
	// 	$dell = DB::table('tbl_provinces')->where('province_id','84')->delete();
	// 		return $dell;
	// }

}
