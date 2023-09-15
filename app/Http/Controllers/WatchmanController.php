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
        $file = fopen('../storage/files/watchmen_230913_2.csv','r');

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
            echo $line_number . " ";
            info($line_number);
            $data = fgetcsv($file);
            if($data[1] == ""){
                // 나라명 없는 경우, 1나라 여러지역
                $data[1] = $nation_name;
            }
            $nation_name = $data[1];
            $this->pledgeToBartizan($data);
        }
    }

    public function pledgeToBartizan($data){
        $nation_name = $data[1];
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
            ];
        }

        $bartizan_row->update([
            'watchman_infos' => json_encode($watchman_info)
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
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
                'district' => $district,
                'position' => "성도",
            ]);
        }

    }
}

