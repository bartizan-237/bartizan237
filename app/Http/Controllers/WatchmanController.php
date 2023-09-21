<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bartizan;
use App\Models\Watchman;
use App\Models\Pledge;
use Illuminate\Http\Request;

class WatchmanController extends Controller
{
    public function sync(){
        // 작정자명단 CSV 파일을 Bartizan에 동기화
//        $file = fopen('../storage/files/watchmen_230913.csv','r');
//        $file = fopen('../storage/files/watchmen_230913_2.csv','r');
        $file = fopen('../storage/files/watchmen_230921_2.csv','r');

        $line_number = 0;
        $nation_name = "";
        $nation_region = "";

        // INSERT pledges TO DB
//        while(!feof($file)) {
//            $line_number++;
//            info($line_number);
//            $data = fgetcsv($file);
//            if($data[1] == ""){
//                // 나라명 없는 경우, 1나라 여러지역
//                $data[1] = $nation_name;
//            }
//            $nation_name = $data[1];
//             $this->updatePledge($data);
//        }

        // UPDATE pledges TO BARTIZAN
        while(!feof($file)) {
            $line_number++;
            info($line_number);
            $data = fgetcsv($file);
            if($data[1] == ""){
                // 나라명 없는 경우, 1나라 여러지역
                $data[0] = $nation_no;
                $data[1] = $nation_name;
            }

            $nation_no = $data[0];
            $nation_name = $data[1];
            echo $line_number . " " . $nation_name . "<br/>";

            $this->pledgeToBartizan($data);
        }
    }

    public function pledgeToBartizan($data){
        $nation_name = $data[1];

        if($nation_name == "토켈라우제도") $nation_name = "토켈라우 제도";
        if($nation_name == "바하마제도") $nation_name = "바하마";
        if($nation_name == "도미니카 연방") $nation_name = "도미니카";
        if($nation_name == "카보베르데") $nation_name = "카부베르드";
        if($nation_name == "터키") $nation_name = "튀르키예";

        if($bartizan_row = Bartizan::where('name', $nation_name)->get()->last()){

        }else{
            return false;
        }

        if($bartizan_row->watchmen_infos == null){
            $watchman_info = (object) [
                'representative' => [],
                'tychicus' => [],
                'watchmen' => [],
                'spy' => []
            ];
        } else {
            $watchman_info = json_decode($bartizan_row->watchman_infos);
        }


        $nation_region = $data[2];
        $elders = explode("\n", $data[3]);
        foreach ($elders as $elder){
            if($elder == null OR $elder == "") continue;

            $tokens = explode("(", $elder);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            $watchman_info->representative[] = [
                'name' => $name,
                'user_id' => null,
                'profile_image' => null,
                'position' => "장로",
                'district' => $this->getDistrict($district),
            ];
        }

        $kwonsas = explode("\n", $data[4]);
        foreach ($kwonsas as $kwonsa){
            if($kwonsa == null OR $kwonsa == "") continue;

            $tokens = explode("(", $kwonsa);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            $watchman_info->watchmen[] = [
                'name' => $name,
                'user_id' => null,
                'profile_image' => null,
                'position' => "권사",
                'district' => $this->getDistrict($district),
            ];
        }

        $ansoos = explode("\n", $data[5]);
        foreach ($ansoos as $ansoo){
            if($ansoo == null OR $ansoo == "") continue;

            $tokens = explode("(", $ansoo);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            $watchman_info->tychicus[] = [
                'name' => $name,
                'user_id' => null,
                'profile_image' => null,
                'position' => "안수집사",
                'district' => $this->getDistrict($district),
            ];
        }


        $remnants = explode("\n", $data[6]);
        foreach ($remnants as $remnant){
            if($remnant == null OR $remnant == "") continue;

            $tokens = explode("(", $remnant);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            $watchman_info->watchmen[] = [
                'name' => $name,
                'user_id' => null,
                'profile_image' => null,
                'position' => "RT",
                'district' => $this->getDistrict($district),
            ];
        }

        $members = explode("\n", $data[7]);
        foreach ($members as $member){
            if($member == null OR $member == "") continue;

            $tokens = explode("(", $member);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            $watchman_info->watchmen[] = [
                'name' => $name,
                'user_id' => null,
                'profile_image' => null,
                'position' => "성도",
                'district' => $this->getDistrict($district),
            ];
        }

        $bartizan_row->update([
            'watchman_infos' => json_encode($watchman_info),
            'dashboard_id' => $data[0]
        ]);
//        dd($watchman_info);
    }

    public function updatePledge($data){
        $nation_name = $data[1];
        $nation_region = $data[2];
        $elders = explode("\n", $data[3]);
        foreach ($elders as $elder){
            if($elder == null OR $elder == "") continue;

            $tokens = explode("(", $elder);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }

            Pledge::create([
                'nation' => $nation_name,
                'nation_region' => $nation_region,
                'name' => $name,
                'district' => $this->getDistrict($district),
                'position' => "장로",
            ]);
        }

        $kwonsas = explode("\n", $data[4]);
        foreach ($kwonsas as $kwonsa){
            if($kwonsa == null OR $kwonsa == "") continue;

            $tokens = explode("(", $kwonsa);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }

            Pledge::create([
                'nation' => $nation_name,
                'nation_region' => $nation_region,
                'name' => $name,
                'district' => $this->getDistrict($district),
                'position' => "권사",
            ]);
        }

        $ansoos = explode("\n", $data[5]);
        foreach ($ansoos as $ansoo){
            if($ansoo == null OR $ansoo == "") continue;

            $tokens = explode("(", $ansoo);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            Pledge::create([
                'nation' => $nation_name,
                'nation_region' => $nation_region,
                'name' => $name,
                'district' => $this->getDistrict($district),
                'position' => "안수집사",
            ]);
        }


        $remnants = explode("\n", $data[6]);
        foreach ($remnants as $remnant){
            if($remnant == null OR $remnant == "") continue;

            $tokens = explode("(", $remnant);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            Pledge::create([
                'nation' => $nation_name,
                'nation_region' => $nation_region,
                'name' => $name,
                'district' => $this->getDistrict($district),
                'position' => "RT",
            ]);
        }

        $members = explode("\n", $data[7]);
        foreach ($members as $member){
            if($member == null OR $member == "") continue;

            $tokens = explode("(", $member);
            $name = $tokens[0];
            if($name == null OR $name == "" OR $name == " ") continue;
            $name = preg_replace('/\[[^\]]+\]/', '', $name);
            if(isset($tokens[1])){
                $district = str_replace(")", "", $tokens[1]);
                $district = explode("/", $district)[0];
            } else {
                $district = null;
            }
            Pledge::create([
                'nation' => $nation_name,
                'nation_region' => $nation_region,
                'name' => $name,
                'district' => $this->getDistrict($district),
                'position' => "성도",
            ]);
        }

    }


    function getDistrict($district){
        if($district == null) return null;
        $result = null;
        $district = trim($district);
        switch ($district){
            case "통영" :
            case "통지" :
            case "통영지" :
            case "통영지교회" : $result = "통영지교회";
                break;
            case "해지" :
            case "해운대지교회" :
            case "해운대지" :$result = "해운대지교회";
                break;
            case "창원" :
            case "창원지교회" :
            case "창지" :$result = "창원지교회";
                break;
            case "해" :
            case "해운대" : $result = "해운대";
                break;
            case "북지" :
            case "북지교회" : $result = "북지교회";
                break;
            case "기장" :
            case "기장지" :
            case "기장지교회" : $result = "기장지교회";
                break;
            case "이천" :
            case "이천지" :
            case "이천지교회" : $result = "이천지교회";
                break;
            case "거제" :
            case "거지" :
            case "거제지" :
            case "거제지교회" : $result = "거제지교회";
                break;
            case "거창" :
            case "거창지" :
            case "거창지교회" : $result = "거창지교회";
                break;
            case "중" :
            case "동" :
            case "서" : $result = "중동서";
                break;
            default :
                $result = $district;
        }

        return $result;
    }
}

