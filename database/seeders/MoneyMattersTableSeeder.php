<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MoneyMatters;

class MoneyMattersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample numbers and their video filenames
       $money_matters = [
        ['money_matter' => 'Bangko', 'video_path' => 'signs/money matters/bangko bank.mp4'],
        ['money_matter' => 'Bank', 'video_path' => 'signs/money matters/bangko bank.mp4'],
        ['money_matter' => 'Bansa', 'video_path' => 'signs/money matters/bansa country.mp4'],
        ['money_matter' => 'Country', 'video_path' => 'signs/money matters/bansa country.mp4'],
        ['money_matter' => 'Barya', 'video_path' => 'signs/money matters/barya coin.mp4'],
        ['money_matter' => 'Coin', 'video_path' => 'signs/money matters/barya coin.mp4'],
        ['money_matter' => 'Cash', 'video_path' => 'signs/money matters/CASH.mp4'],
        ['money_matter' => 'Pera', 'video_path' => 'signs/money matters/barya coin.mp4'],
        ['money_matter' => 'Pera', 'video_path' => 'signs/money matters/CASH.mp4'],
        ['money_matter' => 'Grocery', 'video_path' => 'signs/money matters/grocery.mp4'],
        ['money_matter' => 'Gusto Kong Kumain', 'video_path' => 'signs/money matters/gusto kong kumain.mp4'],
        ['money_matter' => 'I want to eat', 'video_path' => 'signs/money matters/gusto kong kumain.mp4'],
        ['money_matter' => 'How much is the plane ticket?', 'video_path' => 'signs/money matters/how much is the plane ticket.mp4'],
        ['money_matter' => 'Magkano ang ticket sa eroplano?', 'video_path' => 'signs/money matters/how much is the plane ticket.mp4'],
        ['money_matter' => 'Installment', 'video_path' => 'signs/money matters/INSTALLMENT.mp4'],
        ['money_matter' => 'Hulugan', 'video_path' => 'signs/money matters/INSTALLMENT.mp4'],
        ['money_matter' => 'Hulog hulugan', 'video_path' => 'signs/money matters/INSTALLMENT.mp4'],
        ['money_matter' => 'Nasaan ang resibo', 'video_path' => 'signs/money matters/nasaan ang resibo.mp4'],
        ['money_matter' => 'Nasan ang resibo', 'video_path' => 'signs/money matters/nasaan ang resibo.mp4'],
        ['money_matter' => 'Where is the receipt', 'video_path' => 'signs/money matters/nasaan ang resibo.mp4'],
        ['money_matter' => 'Store', 'video_path' => 'signs/money matters/store tindahan.mp4'],
        ['money_matter' => 'Tindahan', 'video_path' => 'signs/money matters/store tindahan.mp4'],
        ['money_matter' => 'Utang', 'video_path' => 'signs/money matters/UTANG.mp4'],
        ['money_matter' => 'Loan', 'video_path' => 'signs/money matters/UTANG.mp4'],

        // Add more numbers as needed
    ];

    // Insert numbers into the database
    foreach ($money_matters as $money_matter) {
        MoneyMatters::create([
            'money_matter' => $money_matter['money_matter'],
            'video_path' => $money_matter['video_path'],
        ]);
    }
    }
}
