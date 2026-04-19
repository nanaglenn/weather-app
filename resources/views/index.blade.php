@extends('layouts.layout')

@section('content')

            <div class="row">
                <div class="col-md-12">
                    <form method="GET" action="{{ url('/get-city-weather') }}" style="border: 1px solid; padding: 10px; border-radius: 10px; margin-bottom: 10px">
                        <div class="row">
                            <div class="col-md-12">

                            <label for="search_predefined">Top locations</label>

                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <select class="form-control" id="search-location-select" name="search-location">
                                    <option value="new york">New York</option>
                                    <option value="london">London</option>
                                    <option value="paris">Paris</option>
                                    <option value="berlin">Berlin</option>
                                    <option value="tokyo">Tokyo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-outline-success">Pull weather information</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>       
            <div class="weather-container row" style="max-height: 520px; overflow-y: scroll">
            @foreach($apiWeatherCollection as $weatherData)
                <div class="col-md-12   " style="height:auto">
                    <div class="card border-light" style="box-shadow: 5px 5px #eee; margin-bottom: 20px">
                        <!-- <div class="card-header">Header</div> -->
                        <div class="card-body">
                            <h5 class="card-title weather-card-h" style="text-align: center"><i class="fa fa-2x">&#xf5a0;</i> {{ $weatherData->city }}, <span>{{ $weatherData->country }}</span></h5>
                            <hr style="margin-bottom: 10px"/>
                            <div class=row>
                                <div class="col-md-12" style="">
                                    <div class="row">
                                        <br/>
                                        <div class="col-md-6 col-xs-6" style="border-right: 1px solid; text-align: center">
                                            <img src="https://openweathermap.org/img/wn/{{$weatherData->icon}}@2x.png" alt="" width="50px" height="auto" style="display: inline"/>

                                            <h2 class="weather-card-h" style="text-align: center; display: inline; vertical-align: middle">{{ $weatherData->temp }}°C</h2>
                                            <p style="text-transform: capitalize">
                                                <i class="fa fa-2x">&#xf192;</i> {{ $weatherData->main }} : {{ $weatherData->description }}
                                            </p>
                                        </div>

                                        <div class="col-md-6 col-xs-6" style="text-align: ">
                                            <p class="added-info"><i class="fa fa-2x">&#xf76b;</i> Expected Low: {{ $weatherData->temp_min }}</p>
                                            <p class="added-info"><i class="fa fa-2x">&#xf769;</i> Expected High: {{ $weatherData->temp_max }}</p>
                                            <p class="added-info"><i class="fa fa-2x">&#xf3a5;</i> Pressure: {{ $weatherData->pressure }}</p>
                                            <p class="added-info"><i class="fa fa-2x">&#xf75f;</i> Humidity: {{ $weatherData->humidity }}</p>
                                            <p class="added-info"><i class="fa fa-2x">&#xf72e;</i> Wind Speed: {{ $weatherData->wind_speed }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection