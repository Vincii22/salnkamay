<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportations;

class TransportationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample numbers and their video filenames
       $transportations = [
        ['transportation' => 'Airport', 'video_path' => 'signs/transportations/airport paliparan.mp4'],
        ['transportation' => 'Paliparan', 'video_path' => 'signs/transportations/airport paliparan.mp4'],
        ['transportation' => 'Ambulansya', 'video_path' => 'signs/transportations/ambulansya ambulance.mp4'],
        ['transportation' => 'Ambulance', 'video_path' => 'signs/transportations/ambulansya ambulance.mp4'],
        ['transportation' => 'Balsa', 'video_path' => 'signs/transportations/balsa. plow. araro.mp4'],
        ['transportation' => 'Plow', 'video_path' => 'signs/transportations/balsa. plow. araro.mp4'],
        ['transportation' => 'Araro', 'video_path' => 'signs/transportations/balsa. plow. araro.mp4'],
        ['transportation' => 'Bisikleta', 'video_path' => 'signs/transportations/bisikleta bicycle bike.mp4'],
        ['transportation' => 'Bicycle', 'video_path' => 'signs/transportations/bisikleta bicycle bike.mp4'],
        ['transportation' => 'Bike', 'video_path' => 'signs/transportations/bisikleta bicycle bike.mp4'],
        ['transportation' => 'Mountain Bike', 'video_path' => 'signs/transportations/bisikleta, mountain bike.mp4'],
        ['transportation' => 'Bus', 'video_path' => 'signs/transportations/bus.mp4'],
        ['transportation' => 'Jeep', 'video_path' => 'signs/transportations/dyip jeep jeepney.mp4'],
        ['transportation' => 'Dyip', 'video_path' => 'signs/transportations/dyip jeep jeepney.mp4'],
        ['transportation' => 'Jeepney', 'video_path' => 'signs/transportations/dyip jeep jeepney.mp4'],
        ['transportation' => 'Eroplano', 'video_path' => 'signs/transportations/eroplano airplane.mp4'],
        ['transportation' => 'Airplane', 'video_path' => 'signs/transportations/eroplano airplane.mp4'],
        ['transportation' => 'Ferry Boat', 'video_path' => 'signs/transportations/ferry boat.mp4'],
        ['transportation' => 'Habal-habal', 'video_path' => 'signs/transportations/habal-habal.mp4'],
        ['transportation' => 'Habal habal', 'video_path' => 'signs/transportations/habal-habal.mp4'],
        ['transportation' => 'Helicopter', 'video_path' => 'signs/transportations/helicopter helikopter.mp4'],
        ['transportation' => 'Helikopter', 'video_path' => 'signs/transportations/helicopter helikopter.mp4'],
        ['transportation' => 'Hot air balloon', 'video_path' => 'signs/transportations/hot air balloon.mp4'],
        ['transportation' => 'Kalesa', 'video_path' => 'signs/transportations/kalesa .mp4'],
        ['transportation' => 'Karwahe', 'video_path' => 'signs/transportations/karwahe carriage.mp4'],
        ['transportation' => 'Carriage', 'video_path' => 'signs/transportations/karwahe carriage.mp4'],
        ['transportation' => 'Motorsiklo', 'video_path' => 'signs/transportations/motorsiklo motorcycle.mp4'],
        ['transportation' => 'Motorcycle', 'video_path' => 'signs/transportations/motorsiklo motorcycle.mp4'],
        ['transportation' => 'Motor', 'video_path' => 'signs/transportations/motorsiklo motorcycle.mp4'],
        ['transportation' => 'Truck ng basura', 'video_path' => 'signs/transportations/trak ng basura, dump truck, garbage truck.mp4'],
        ['transportation' => 'Dump Truck', 'video_path' => 'signs/transportations/trak ng basura, dump truck, garbage truck.mp4'],
        ['transportation' => 'Garbage Truck', 'video_path' => 'signs/transportations/trak ng basura, dump truck, garbage truck.mp4'],
        ['transportation' => 'Truck ng Bumbero', 'video_path' => 'signs/transportations/trak ng bumbero fire truck.mp4'],
        ['transportation' => 'Bumbero', 'video_path' => 'signs/transportations/trak ng bumbero fire truck.mp4'],
        ['transportation' => 'Fire Truck', 'video_path' => 'signs/transportations/trak ng bumbero fire truck.mp4'],

        // Add more numbers as needed
    ];

    // Insert numbers into the database
    foreach ($transportations as $transportation) {
        Transportations::create([
            'transportation' => $transportation['transportation'],
            'video_path' => $transportation['video_path'],
        ]);
    }
    }
}
