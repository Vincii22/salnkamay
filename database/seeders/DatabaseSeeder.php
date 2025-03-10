<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LettersTableSeeder::class);
        $this->call(PhraseTableSeeder::class);
        $this->call(class: NumbersTableSeeder::class);
        $this->call(class: TimeExpressionsTableSeeder::class);
        $this->call(class: FoodsTableSeeder::class);
        $this->call(class: AnimalsTableSeeder::class);
        $this->call(class: FamilySignsTableSeeder::class);
        $this->call(class: MoneyMattersTableSeeder::class);
        $this->call(class: WeathersTableSeeder::class);
        $this->call(class: MonthsTableSeeder::class);
        $this->call(class: TransportationsTableSeeder::class);
    }
}
