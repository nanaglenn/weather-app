@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{ url('/get-city-weather-date') }}" style="">
                <div class="row">
                    <div class="col-md-12">

                        <label for="">Search Weather information by date</label>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <select class="form-control" id="search-weather-month" name="weather-month">
                            <option>Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="weather-day" name="weather-day" min="1" max="31" placeholder="Day" >
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="weather-year" name="weather-year" min="1970" max="2023" placeholder="Year" >
                    </div>
                </div>
                <div class="row">
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

                                    <div class="col-md-6 col-xs-6">
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