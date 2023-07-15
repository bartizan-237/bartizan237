<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $nations = Nation::paginate(10);
        $nations = Nation::paginate(10); //237
        return view('nation.index', [
            'nations' => $nations
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        return view("nation.show", [
            "nation" => $nation
        ]);
    }


    public function createNations(){
        $file = fopen('../storage/files/237.csv','r');
        $i = 0;
        while(!feof($file)) {
            $i++;
            info("[$i]");
            $line = fgets($file);
//            info($line);
            $data = str_getcsv($line, ",");
//            dd($data);


            if($i <= 1) {
                continue;
            } else {
//                dd($data);
                $code = $data[1];
                $continent_code = explode("-", $code)[0];
                $country_no = explode("-", $code)[1];

                $continent = null;
                switch ($continent_code){
                    case "AS" : $continent = "Asia"; break;
                    case "EU" : $continent = "Europe"; break;
                    case "AF" : $continent = "Africa"; break;
                    case "AM" :
                        if($country_no <= 13) $continent = "North America";
                        else $continent = "South America";
                        break;
                    case "OC" : $continent = "Oceania"; break;
                }

                $total_tribes = trim($data[9]);
                if($total_tribes == "-" OR $total_tribes == "") $total_tribes = null;

                $unreached_tribes = trim($data[10]);
                if($unreached_tribes == "-" OR $unreached_tribes == "") $unreached_tribes = null;

                $remnant_system = $data[24];
                if($remnant_system == "X" OR $remnant_system == null) $remnant_system = 0;
                else $remnant_system = 1;


                $protestant = trim($data[14]);
                if($protestant == "") $protestant = null;
                $catholicism = trim($data[15]);
                if($catholicism == "") $catholicism = null;
                $orthodox = trim($data[16]);
                if($orthodox == "") $orthodox = null;
                $heresy = trim($data[17]);
                if($heresy == "") $heresy = null;
                $buddhism = trim($data[18]);
                if($buddhism == "") $buddhism = null;
                $islam = trim($data[19]);
                if($islam == "") $islam = null;
                $hinduism = trim($data[20]);
                if($hinduism == "") $hinduism = null;
                $shamanism = trim($data[21]);
                if($shamanism == "") $shamanism = null;
                $etc_religion = trim($data[22]);
                if($etc_religion == "") $etc_religion = null;
                $broadcasting_missions = trim($data[23]);
                if($broadcasting_missions == "") $broadcasting_missions = null;


                $population = str_replace(",", "", $data[7]);
                if($population == "" OR $population == "-") $population = null;
                $gdp = str_replace(",", "", $data[13]);
                if($gdp == "" OR $gdp == "-") $gdp = null;


                $area = str_replace(",", "", $data[6]);
                if($area == "" OR $area == "-") $area = null;

                info("NATION CREATE >> $continent " . trim($data[2]));

                Nation::create([
                    "continent" => $continent,
                    "name" => trim($data[2]),
                    "name_en" => trim($data[3]),
                    "capital" => trim($data[4]),
                    "code" => $code,
                    "languages" => json_encode( explode(",", $data[5]) ),
                    "area" => $area,
                    "population" => $population,
                    "tribes" => trim($data[8]),
                    "total_tribes" => $total_tribes,
                    "unreached_tribes" => $unreached_tribes,
                    "major_tribes" => trim($data[11]),
                    "gdp" => $gdp,
                    "protestant" => $protestant,
                    "catholicism" => $catholicism,
                    "orthodox" => $orthodox,
                    "heresy" => $heresy,
                    "buddhism" => $buddhism,
                    "islam" => $islam,
                    "hinduism" => $hinduism,
                    "shamanism" => $shamanism,
                    "etc_religion" => $etc_religion,
                    "broadcasting_missions" => $broadcasting_missions,
                    "remnant_system" => $remnant_system,
                ]);
            }
        }
        dd($data);

        return view("test");
    }
}
