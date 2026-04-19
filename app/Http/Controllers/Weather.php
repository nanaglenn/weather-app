<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class Weather extends Controller
{
    public function getWeatherByCity($cityList = array()){
        $apiWeatherCollection = new Collection();
        $recentWeatherUpdates = array();
        $urlPartOne = ""; $urlPartTwo = "";
        for($i = 0; $i < sizeof($cityList); $i++){
            $cityDataUrl = "http://api.openweathermap.org/geo/1.0/direct?q=".$cityList[$i]."&limit=5&appid=c1c08986966ed691eeeb9ed72762b4d7";
            $cityWeatherData =  Http::get($cityDataUrl)->collect();
            $geoLocations = array();

            $geoLocIterator = 0;
            foreach($cityWeatherData as $cityData){
                $geoLocations[$geoLocIterator] = [$cityData["lat"] , $cityData["lon"]];
                $geoLocIterator++;
            }

            for($iterator = 0; $iterator < sizeof($geoLocations); $iterator++){
                
                for($innerIterator = 0; $innerIterator < sizeof($geoLocations[$iterator]); $innerIterator++){
                    $urlPartOne = "https://api.openweathermap.org/data/2.5/weather?lat=".$geoLocations[$iterator][$innerIterator];
                    $innerIterator++;
                    $urlPartTwo = "&lon=".$geoLocations[$iterator][$innerIterator]."&appid=c1c08986966ed691eeeb9ed72762b4d7&units=metric";
                }
                $recentWeatherUpdates[$iterator] = Http::get($urlPartOne.$urlPartTwo)->collect();

            }
        }
        $apiWeatherCollection = $this->create($recentWeatherUpdates);
    
        $this->store($apiWeatherCollection);

        return $apiWeatherCollection; 
    }

    public function getWeatherByDate(Request $request){
        $day = $request->input('weather-day'); $month = $request->input('weather-month'); $year = $request->input('weather-year');

        if(strlen($day) == 1){
            $day = "0".$day;
        }
        $date = $year."-".$month."-".$day;
        $apiWeatherCollection = DB::SELECT("SELECT * FROM weather WHERE created_at LIKE '%$date%' ORDER BY id DESC LIMIT 5");

        if(sizeof($apiWeatherCollection) == 0){
            return "No Data Found For Entered Date ";
        }else
            return view("date", compact("apiWeatherCollection"));
    }

    // --------------------------------------------CRUD---------------------------------------

    public function index(){
        
        $predefinedCities = array("London", "Tokyo", "Paris", "New York", "Berlin");
        $apiWeatherCollection = new Collection();

        $apiWeatherCollection = $this->getWeatherByCity($predefinedCities);
        
        if(request()->is('weather-api')){

            return view("index", compact("apiWeatherCollection"));

        }else{

            return view("date", compact("apiWeatherCollection"));    

        }
    }
  
    public function create($recentWeatherUpdates = array()){
        $apiWeatherCollection = new Collection(); 
        
        foreach($recentWeatherUpdates as $geoWeatherData){
            
            //coord
            $lon = $geoWeatherData["coord"]["lon"];
            $lat = $geoWeatherData["coord"]["lat"];

            //weather
            $main = $geoWeatherData["weather"][0]["main"];
            $desc = $geoWeatherData["weather"][0]["description"];
            $icon = $geoWeatherData["weather"][0]["icon"];

            //main
            $temp = $geoWeatherData["main"]["temp"];
            $tempMin = $geoWeatherData["main"]["temp_min"];
            $tempMax = $geoWeatherData["main"]["temp_max"];
            $pressure = $geoWeatherData["main"]["pressure"];
            $humidity = $geoWeatherData["main"]["humidity"];

            //wind
            $windSpeed = $geoWeatherData["wind"]["speed"];

            //sys
            // $countryId = $geoWeatherData["sys"]["id"];
            $country = $geoWeatherData["sys"]["country"];

            //name
            $cityId = $geoWeatherData["id"];
            $city = $geoWeatherData["name"];

            //name
            $id = $geoWeatherData["id"];

            //dt
            $timestamp = gmdate("Y-m-d h:i:s", $geoWeatherData["dt"]);

            $apiWeatherCollection->push((Object) ["lon"=>$lon, "lat"=>$lat, "cityId"=>$cityId, "city"=>$city, "country"=>$country, "icon"=>$icon, "main"=>$main, "description"=>$desc, "temp"=>$temp, "temp_min"=>$tempMin, "temp_max"=>$tempMax, "pressure"=>$pressure, "humidity"=>$humidity, "wind_speed"=>$windSpeed, "time_stamp"=>$timestamp]);

        }
        return $apiWeatherCollection;
    }     

    public function store(Collection $dataArray){

        foreach($dataArray as $geoWeatherData){
            
            DB::INSERT("INSERT INTO weather (lon,lat,city_id,city,country,icon,main,description,temp,temp_min,temp_max,pressure,humidity,wind_speed,created_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $geoWeatherData->lon, $geoWeatherData->lat, $geoWeatherData->cityId, $geoWeatherData->city, $geoWeatherData->country, $geoWeatherData->icon, $geoWeatherData->main, $geoWeatherData->description, $geoWeatherData->temp, $geoWeatherData->temp_min, $geoWeatherData->temp_max, $geoWeatherData->pressure, $geoWeatherData->humidity, $geoWeatherData->wind_speed, $geoWeatherData->time_stamp
            ]);

        }
        return;
    }

    public function show(Request $request){
        
        if(strlen($request->input("search-location")) != 0){
            $searchCity[0] = $request->input("search-location");
            $apiWeatherCollection = new Collection();
            $apiWeatherCollection = $this->getWeatherByCity($searchCity);
            // return $apiWeatherCollection;
            return view("index", compact("apiWeatherCollection"));
        } else{
            return "Invalid search value, please enter the name of a city.";
        }
    }
}
