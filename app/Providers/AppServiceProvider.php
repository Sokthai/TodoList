<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Todo;
use App\Http\Controllers\WeatherAPIcontroller;
use App\Exceptions\Handler;
use Mockery\Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


//        view()->composer('pages.index', function($view){ //share to pages.index only
//            $view->with('todos', Todo::getAllDataCurrentUser());
//        });



        $key = "44cfee378183e20f";
        $city = $this->getCityState()[0];
        $state = $this->getCityState()[1];

        $actualCity = str_replace(" ", '_', $city);
        $json_string = file_get_contents("http://api.wunderground.com/api/" . $key . "/geolookup/conditions/q/" . $state . "/" . $actualCity . ".json");
        $parsed_json = json_decode($json_string);
        $location = title_case($city);

        if (isset($parsed_json->{'location'}->{'city'})){
            $location = $parsed_json->{'location'}->{'city'};
            $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
        }else{
            $temp_f = "Unavailable";
        }


        view()->share('location', $location);//share location and temp_f variables to all view
        view()->share('temp_f', $temp_f);

        view()->share('offset', 0);

    }









    public function getCityState(){ //only USA and Cambodia location

        if (isset($_COOKIE['latLng'])){
            $latLng = explode(',', $_COOKIE['latLng']);
        }else{
            $latLng = [42.3601, -71.0589];
        }

        $lat = $latLng[0];
        $lng = $latLng[1];
        $url = sprintf("https://maps.googleapis.com/maps/api/geocode/json?latlng=%s,%s", $lat, $lng);

        $content = file_get_contents($url); // get json content
        $metadata = json_decode($content, true); //json decoder

        if(count($metadata['results']) > 0) {
            // for format example look at url
            // https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452
            $result = $metadata['results'][0];


//            echo "formatted address : " . $result['formatted_address'] . "<br/>";
            $address = explode(',', $result['formatted_address']);


            $s = 2; $c = 3;
            $country = $address[sizeof($address) - 1];

//            echo "country is " . $country . "<br/>";
            if ((str_contains($country, 'Cambodia'))){
                $s = 1; $c = 2;
            }elseif (!(str_contains($country, 'USA'))){
                return ['boston', 'ma'];
            }

            $state = $address[sizeof($address) - $s];
            $state = substr($state, 1, strlen($state));

            if (str_contains($country, 'USA'))
                $state = substr($state, 0 , 2);



            $city =  $address[sizeof($address) - $c];
            $city = substr($city, 1, strlen($city));
            if (str_contains($city, 'Krong'))
                $city = substr($city, 6, strlen($city));
            return [$city, $state] ;
        }
        else {
            return ['boston', 'ma'];
        }
    }




    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
