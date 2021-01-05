<?php
namespace App\Http\Controllers\Admins;
namespace App\Http\Controllers;
use App\model\TestapiModel as s1000rr;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Admins\LoginRequest;
use Illuminate\Routing\Controller;
use Auth;
use Validator,Redirect,Response,File;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

class ApiController extends Controller
{
    public function register(Request $request){

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        //return "555"; die;
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data); die;

        $username = $data->username;
        $password = $data->password;
        $bb = md5($password);
        $level = $data->level;


        $data = [
            'username' => $username,
            'password' => $bb,
            'level' => $level,
        ];

        $insert = DB::table('users')->insertGetId($data);
        return $insert;
    }

    public function proin(Request $request){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        $data = json_decode(file_get_contents("php://input"));

        $province_code = $data->province_code;
        $province_name = $data->province_name;
        $province_name_eng = $data->province_name_eng;
        $geo_id = $data->geo_id;

        $data = [
            'province_code' => $province_code,
            'province_name' => $province_name,
            'province_name_eng' => $province_name_eng,
            'geo_id' => $geo_id,
        ];

        $proinn = DB::table('tbl_provinces')->insertGetId($data);
        return $proinn;
    }

    public function edit(Request $request){

        $data = json_decode(file_get_contents("php://input"));

        $id = $data->id;
        $province_code = $data->province_code;
        $province_name = $data->province_name;
        $province_name_eng = $data->province_name_eng;
        $geo_id = $data->geo_id;

        $data = array(
            'province_code' => $province_code,
            'province_name' => $province_name,
            'province_name_eng' => $province_name_eng,
            'geo_id' => $geo_id,
        );

        $edit = DB::table('tbl_provinces')->where('id',$id)->update($data);
        $update = $edit;

    }

    public function login(Request $request){

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        $data = json_decode(file_get_contents("php://input"));

        $username = $data->username;
        $password = $data->password;
        $bb = md5($password);

        $data = array(
            'username' => $username,
            'password' => $bb,
        );

        $sql = DB::table('users')
        ->where('username',$username)
        ->where('password',$bb)
        ->get();

        return $sql;

    }

    public function delete(Request $request){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        $data = json_decode(file_get_contents("php://input"));

        $id = $data->id;
        
        $delete = DB::table('tbl_provinces')
        ->where('id',$id)
        ->delete();
        return $delete;
    }

    public function showgeo(){

        $geo = DB::table('geography')
        ->select('GEO_ID','GEO_NAME')
        ->get();
        return $geo;
    }

    public function showprovince(Request $request){

        $data = json_decode(file_get_contents("php://input"));
        $geo = $data->geo;

        $prov = DB::table('province')
        ->select('PROVINCE_ID','PROVINCE_CODE','PROVINCE_NAME','GEO_ID')
        ->where('GEO_ID',$geo)
        ->get();
        return $prov;
    }

    public function showdistrict(){
        $data = json_decode(file_get_contents("php://input"));
        $ap_id = $data->ap_id;

        $dis = DB::table('district')
        ->select('DISTRICT_ID','DISTRICT_CODE','DISTRICT_NAME','AMPHUR_ID','PROVINCE_ID','GEO_ID')
        ->where('AMPHUR_ID',$ap_id)
        ->get();
        return $dis;
    }

    public function showamphur(){
        $data = json_decode(file_get_contents("php://input"));
        $proid = $data->proid;

        $amphur = DB::table('amphur')
        ->select('AMPHUR_ID','AMPHUR_CODE','AMPHUR_NAME','GEO_ID','PROVINCE_ID')
        ->where('PROVINCE_ID',$proid)
        ->get();
        return $amphur;
    }

    public function showzipcode(){
        $data = json_decode(file_get_contents("php://input"));
        $amphur_id = $data->amphur_id;

        $zipcode = DB::table('zipcode')
        ->select('ZIPCODE_ID','DISTRICT_CODE','PROVINCE_ID','AMPHUR_ID','DISTRICT_ID','ZIPCODE')
        ->where('DISTRICT_ID',$amphur_id)
        ->get();
        return $zipcode;
    }

    public function showjang(Request $request){

        $show = DB::table('province')->select('PROVINCE_ID','PROVINCE_CODE','PROVINCE_NAME','GEO_ID')
        ->get();

        if (!empty($request->all())) {
          $searchtable = s1000rr::search($request['Search']);
      }else{
          return $show;
      }
  }

    public function insertimg(Request $request) {

        // $data = json_decode(file_get_contents("php://input"));
   
        $fileName = "fileName" . time() . '.' . request()->fileToUpload->getClientOriginalExtension();

           $data = [
          'img_name' => $fileName,
        ];

    $images = DB::table('image')->insert($data);
      
 request()->fileToUpload->move(public_path('fileupload'), $fileName);

 }








}