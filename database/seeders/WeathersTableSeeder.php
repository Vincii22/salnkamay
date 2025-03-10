<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weather;

class WeathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample numbers and their video filenames
       $weathers = [
        ['weather' => 'Air', 'video_path' => 'signs/weathers/air hangin.mp4'],
        ['weather' => 'Hangin', 'video_path' => 'signs/weathers/air hangin.mp4'],
        ['weather' => 'Araw', 'video_path' => 'signs/weathers/araw sun.mp4'],
        ['weather' => 'Sun', 'video_path' => 'signs/weathers/araw sun.mp4'],
        ['weather' => 'Bagyo', 'video_path' => 'signs/weathers/bagyo storm.mp4'],
        ['weather' => 'Storm', 'video_path' => 'signs/weathers/bagyo storm.mp4'],
        ['weather' => 'Baha', 'video_path' => 'signs/weathers/baha flood.mp4'],
        ['weather' => 'Flood', 'video_path' => 'signs/weathers/baha flood.mp4'],
        ['weather' => 'Bahaghari', 'video_path' => 'signs/weathers/bahaghari rainbow.mp4'],
        ['weather' => 'Rainbow', 'video_path' => 'signs/weathers/bahaghari rainbow.mp4'],
        ['weather' => 'Buhawi', 'video_path' => 'signs/weathers/buhawi tornado.mp4'],
        ['weather' => 'Tornado', 'video_path' => 'signs/weathers/buhawi tornado.mp4'],
        ['weather' => 'Clear Sky', 'video_path' => 'signs/weathers/clear sky payapang panahon.mp4'],
        ['weather' => 'Payapang Panahon', 'video_path' => 'signs/weathers/clear sky payapang panahon.mp4'],
        ['weather' => 'Cloudy', 'video_path' => 'signs/weathers/cloudy maulap.mp4'],
        ['weather' => 'Maulap', 'video_path' => 'signs/weathers/cloudy maulap.mp4'],
        ['weather' => 'Cold', 'video_path' => 'signs/weathers/cold malamig.mp4'],
        ['weather' => 'Malamig', 'video_path' => 'signs/weathers/cold malamig.mp4'],
        ['weather' => 'Dry', 'video_path' => 'signs/weathers/dry tuyo.mp4'],
        ['weather' => 'Tuyo', 'video_path' => 'signs/weathers/dry tuyo.mp4'],
        ['weather' => 'Giniginaw', 'video_path' => 'signs/weathers/giniginaw freeze.mp4'],
        ['weather' => 'Freeze', 'video_path' => 'signs/weathers/giniginaw freeze.mp4'],
        ['weather' => 'Freezing', 'video_path' => 'signs/weathers/giniginaw freeze.mp4'],
        ['weather' => 'Hamog', 'video_path' => 'signs/weathers/hamog fog.mp4'],
        ['weather' => 'Fog', 'video_path' => 'signs/weathers/hamog fog.mp4'],
        ['weather' => 'Hangin', 'video_path' => 'signs/weathers/hangin wind.mp4'],
        ['weather' => 'Wind', 'video_path' => 'signs/weathers/hangin wind.mp4'],
        ['weather' => 'High Temperature', 'video_path' => 'signs/weathers/hot mainit ang init.mp4'],
        ['weather' => 'Mainit', 'video_path' => 'signs/weathers/hot mainit ang init.mp4'],
        ['weather' => 'Hot', 'video_path' => 'signs/weathers/hot mainit ang init.mp4'],
        ['weather' => 'Ang init', 'video_path' => 'signs/weathers/hot mainit ang init.mp4'],
        ['weather' => 'Mainit', 'video_path' => 'signs/weathers/hot mainit ang init.mp4'],
        ['weather' => 'How is the weather', 'video_path' => 'signs/weathers/how_s the weather in your city.mp4'],
        ['weather' => 'How is the weather in your city', 'video_path' => 'signs/weathers/how_s the weather in your city.mp4'],
        ['weather' => 'Kumusta ang panahon', 'video_path' => 'signs/weathers/how_s the weather in your city.mp4'],
        ['weather' => 'Kumusta ang panahon sainyo', 'video_path' => 'signs/weathers/trak ng bumbero fire truck.mp4'],
        ['weather' => 'Kumusta ang panahon ngayon', 'video_path' => 'signs/weathers/hows the weather today kumusta ang panahon ngayon.mp4'],
        ['weather' => 'How\'s the weather', 'video_path' => 'signs/weathers/hows the weather today kumusta ang panahon ngayon.mp4'],
        ['weather' => 'How\'s the weather today', 'video_path' => 'signs/weathers/hows the weather today kumusta ang panahon ngayon.mp4'],
        ['weather' => 'Humid', 'video_path' => 'signs/weathers/humid maalinsangan.mp4'],
        ['weather' => 'Maalinsangan', 'video_path' => 'signs/weathers/humid maalinsangan.mp4'],
        ['weather' => 'It\'s cold', 'video_path' => 'signs/weathers/its cold malamig na.mp4'],
        ['weather' => 'Malamig na', 'video_path' => 'signs/weathers/its cold malamig na.mp4'],
        ['weather' => 'Mainit na', 'video_path' => 'signs/weathers/its hot mainit na.mp4'],
        ['weather' => 'It\'s hot', 'video_path' => 'signs/weathers/its hot mainit na.mp4'],
        ['weather' => 'It\'s warm', 'video_path' => 'signs/weathers/its warm maalinsangan na.mp4'],
        ['weather' => 'Maalinsangan na', 'video_path' => 'signs/weathers/its warm maalinsangan na.mp4'],
        ['weather' => 'Kidlat', 'video_path' => 'signs/weathers/kidlat lightning.mp4'],
        ['weather' => 'Lightning', 'video_path' => 'signs/weathers/kidlat lightning.mp4'],
        ['weather' => 'Kulog', 'video_path' => 'signs/weathers/kulog thunder.mp4'],
        ['weather' => 'Thunder', 'video_path' => 'signs/weathers/kulog thunder.mp4'],
        ['weather' => 'Low Temperature', 'video_path' => 'signs/weathers/low temperature malamig.mp4'],
        ['weather' => 'Malamig', 'video_path' => 'signs/weathers/low temperature malamig.mp4'],
        ['weather' => 'Maaraw', 'video_path' => 'signs/weathers/maaraw.mp4'],
        ['weather' => 'Sunny', 'video_path' => 'signs/weathers/maaraw.mp4'],
        ['weather' => 'Sunny Day', 'video_path' => 'signs/weathers/maaraw.mp4'],
        ['weather' => 'Makulimlim', 'video_path' => 'signs/weathers/makulimlim 2.mp4'],
        ['weather' => 'Maliwanag', 'video_path' => 'signs/weathers/maliwanag bright.mp4'],
        ['weather' => 'Bright', 'video_path' => 'signs/weathers/maliwanag bright.mp4'],
        ['weather' => 'Rain', 'video_path' => 'signs/weathers/rain ulan.mp4'],
        ['weather' => 'Ulan', 'video_path' => 'signs/weathers/rain ulan.mp4'],
        ['weather' => 'Rainy', 'video_path' => 'signs/weathers/rainy maulan.mp4'],
        ['weather' => 'Maulan', 'video_path' => 'signs/weathers/rainy maulan.mp4'],
        ['weather' => 'Smog', 'video_path' => 'signs/weathers/smog.mp4'],
        ['weather' => 'Snow', 'video_path' => 'signs/weathers/snow niyebe.mp4'],
        ['weather' => 'Niyebe', 'video_path' => 'signs/weathers/snow niyebe.mp4'],
        ['weather' => 'Snowing', 'video_path' => 'signs/weathers/snowing snowy.mp4'],
        ['weather' => 'Snowy', 'video_path' => 'signs/weathers/snowing snowy.mp4'],
        ['weather' => 'Stormy', 'video_path' => 'signs/weathers/stormy bagyo.mp4'],
        ['weather' => 'Bagyo', 'video_path' => 'signs/weathers/stormy bagyo.mp4'],
        ['weather' => 'Temperature', 'video_path' => 'signs/weathers/temperature.mp4'],
        ['weather' => 'Temperatura', 'video_path' => 'signs/weathers/temperature.mp4'],
        ['weather' => 'Ulap', 'video_path' => 'signs/weathers/ulap cloud.mp4'],
        ['weather' => 'Cloud', 'video_path' => 'signs/weathers/ulap cloud.mp4'],
        ['weather' => 'Warm', 'video_path' => 'signs/weathers/warm maalinsangan.mp4'],
        ['weather' => 'Maalinsangan', 'video_path' => 'signs/weathers/warm maalinsangan.mp4'],
        ['weather' => 'Wet', 'video_path' => 'signs/weathers/wet basa.mp4'],
        ['weather' => 'Basa', 'video_path' => 'signs/weathers/wet basa.mp4'],




        // Add more numbers as needed
    ];

    // Insert numbers into the database
    foreach ($weathers as $weather) {
        Weather::create([
            'weather' => $weather['weather'],
            'video_path' => $weather['video_path'],
        ]);
    }
    }
}
