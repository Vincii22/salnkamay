<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Month;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample months and their video filenames
       $months = [
        ['month' => 'Abril', 'video_path' => 'signs/months/ABRIL APRIL.mp4'],
        ['month' => 'April', 'video_path' => 'signs/months/ABRIL APRIL.mp4'],
        ['month' => 'Agosto', 'video_path' => 'signs/months/AGOSTO AUGUST.mp4'],
        ['month' => 'August', 'video_path' => 'signs/months/AGOSTO AUGUST.mp4'],
        ['month' => 'Araw', 'video_path' => 'signs/months/araw day.mp4'],
        ['month' => 'Day', 'video_path' => 'signs/months/araw day.mp4'],
        ['month' => 'Buwan', 'video_path' => 'signs/months/buwan month.mp4'],
        ['month' => 'Month', 'video_path' => 'signs/months/buwan month.mp4'],
        ['month' => 'Dalawang araw', 'video_path' => 'signs/months/dalawang araw 2 days.mp4'],
        ['month' => '2 Days', 'video_path' => 'signs/months/dalawang araw 2 days.mp4'],
        ['month' => 'Dalawang Buwan', 'video_path' => 'signs/months/dalawang buwan 2 months.mp4'],
        ['month' => '2 Months', 'video_path' => 'signs/months/dalawang buwan 2 months.mp4'],
        ['month' => 'Dalawang Linggo', 'video_path' => 'signs/months/dalawang linggo 2 weeks.mp4'],
        ['month' => '2 Weeks', 'video_path' => 'signs/months/dalawang linggo 2 weeks.mp4'],
        ['month' => 'Dalawang Taon', 'video_path' => 'signs/months/dalawang taon 2 years.mp4'],
        ['month' => '2 Years', 'video_path' => 'signs/months/dalawang taon 2 years.mp4'],
        ['month' => 'Disyembre', 'video_path' => 'signs/months/disyembre december.mp4'],
        ['month' => 'December', 'video_path' => 'signs/months/disyembre december.mp4'],
        ['month' => 'Enero', 'video_path' => 'signs/months/ENERO JANUARY.mp4'],
        ['month' => 'January', 'video_path' => 'signs/months/ENERO JANUARY.mp4'],
        ['month' => 'Hulyo', 'video_path' => 'signs/months/HULYO JULY.mp4'],
        ['month' => 'July', 'video_path' => 'signs/months/HULYO JULY.mp4'],
        ['month' => 'Hunyo', 'video_path' => 'signs/months/HUNYO JUNE.mp4'],
        ['month' => 'June', 'video_path' => 'signs/months/HUNYO JUNE.mp4'],
        ['month' => 'Isang Araw', 'video_path' => 'signs/months/isang araw 1 day.mp4'],
        ['month' => '1 Day', 'video_path' => 'signs/months/isang araw 1 day.mp4'],
        ['month' => 'Isang Buwan', 'video_path' => 'signs/months/isang buwan 1 month.mp4'],
        ['month' => '1 Month', 'video_path' => 'signs/months/isang buwan 1 month.mp4'],
        ['month' => '1 Week', 'video_path' => 'signs/months/isang linggo 1 week.mp4'],
        ['month' => 'Isang Linggo', 'video_path' => 'signs/months/isang linggo 1 week.mp4'],
        ['month' => 'Isang Taon', 'video_path' => 'signs/months/isang taon 1 year.mp4'],
        ['month' => '1 Year', 'video_path' => 'signs/months/isang taon 1 year.mp4'],
        ['month' => 'Linggo', 'video_path' => 'signs/months/linggo week.mp4'],
        ['month' => 'Week', 'video_path' => 'signs/months/linggo week.mp4'],
        ['month' => 'Marso', 'video_path' => 'signs/months/MARSO MARCH.mp4'],
        ['month' => 'March', 'video_path' => 'signs/months/MARSO MARCH.mp4'],
        ['month' => 'Mayo', 'video_path' => 'signs/months/mayo may.mp4'],
        ['month' => 'May', 'video_path' => 'signs/months/mayo may.mp4'],
        ['month' => 'Next Month', 'video_path' => 'signs/months/NEXT MONTH SUSUNOD NA BUWAN.mp4'],
        ['month' => 'Susunod na buwan', 'video_path' => 'signs/months/NEXT MONTH SUSUNOD NA BUWAN.mp4'],
        ['month' => 'Nobyembre', 'video_path' => 'signs/months/NOBYEMBRE NOVEMBER.mp4'],
        ['month' => 'November', 'video_path' => 'signs/months/NOBYEMBRE NOVEMBER.mp4'],
        ['month' => 'Oktubre', 'video_path' => 'signs/months/OKTUBRE OCTOBER.mp4'],
        ['month' => 'October', 'video_path' => 'signs/months/OKTUBRE OCTOBER.mp4'],
        ['month' => 'Pebrero', 'video_path' => 'signs/months/PEBRERO FEBRUARY.mp4'],
        ['month' => 'February', 'video_path' => 'signs/months/PEBRERO FEBRUARY.mp4'],
        ['month' => 'Febrary', 'video_path' => 'signs/months/PEBRERO FEBRUARY.mp4'],
        ['month' => 'Setyembre', 'video_path' => 'signs/months/SETYEMBRE SEPTEMBER.mp4'],
        ['month' => 'Septyembre', 'video_path' => 'signs/months/SETYEMBRE SEPTEMBER.mp4'],
        ['month' => 'September', 'video_path' => 'signs/months/SETYEMBRE SEPTEMBER.mp4'],
        ['month' => 'Taon', 'video_path' => 'signs/months/taon year.mp4'],
        ['month' => 'Year', 'video_path' => 'signs/months/taon year.mp4'],
        ['month' => 'Tatlong araw', 'video_path' => 'signs/months/tatlong araw 3 days.mp4'],
        ['month' => '3 Days', 'video_path' => 'signs/months/tatlong araw 3 days.mp4'],
        ['month' => 'Tatlong Buwan', 'video_path' => 'signs/months/tatlong buwan 3 months.mp4'],
        ['month' => '3 Months', 'video_path' => 'signs/months/tatlong buwan 3 months.mp4'],
        ['month' => '3 Weeks', 'video_path' => 'signs/months/tatlong linggo 3 weeks.mp4'],
        ['month' => 'Tatlong linggo', 'video_path' => 'signs/months/tatlong linggo 3 weeks.mp4'],
        ['month' => '3 years', 'video_path' => 'signs/months/tatlong taon 3 years.mp4'],
        ['month' => 'Tatlong Taon', 'video_path' => 'signs/months/tatlong taon 3 years.mp4'],





        // Add more months as needed
    ];

    // Insert months into the database
    foreach ($months as $month) {
        Month::create([
            'month' => $month['month'],
            'video_path' => $month['video_path'],
        ]);
    }
    }
}
