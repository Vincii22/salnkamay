<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample animals and their video filenames
       $animals = [
        ['animal' => 'animal', 'video_path' => 'signs/animals/ANIMAL HAYOP.mp4'],
        ['animal' => 'hayop', 'video_path' => 'signs/animals/isa (one).png'],
        ['animal' => 'ant', 'video_path' => 'signs/animals/ant, langgam.mp4'],
        ['animal' => 'langgam', 'video_path' => 'signs/animals/ant, langgam.mp4'],
        ['animal' => 'ant', 'video_path' => 'signs/animals/ant.mp4'],
        ['animal' => 'langgam', 'video_path' => 'signs/animals/ant.mp4'],
        ['animal' => 'paniki', 'video_path' => 'signs/animals/BAT PANIKI.mp4'],
        ['animal' => 'bat', 'video_path' => 'signs/animals/BAT PANIKI.mp4'],
        ['animal' => 'bear', 'video_path' => 'signs/animals/BEAR OSO.mp4'],
        ['animal' => 'oso', 'video_path' => 'signs/animals/BEAR OSO.mp4'],
        ['animal' => 'bee', 'video_path' => 'signs/animals/bee, bubuyog.mp4'],
        ['animal' => 'bubuyog', 'video_path' => 'signs/animals/bee, bubuyog.mp4'],
        ['animal' => 'bird', 'video_path' => 'signs/animals/bird ibon.mp4'],
        ['animal' => 'ibon', 'video_path' => 'signs/animals/bird ibon.mp4'],
        ['animal' => 'bird', 'video_path' => 'signs/animals/bird.mp4'],
        ['animal' => 'bug', 'video_path' => 'signs/animals/bug.mp4'],
        ['animal' => 'butterfly', 'video_path' => 'signs/animals/BUTTERFLY, PARU PARO.mp4'],
        ['animal' => 'paru paro', 'video_path' => 'signs/animals/BUTTERFLY, PARU PARO.mp4'],
        ['animal' => 'camel', 'video_path' => 'signs/animals/camel.mp4'],
        ['animal' => 'carabao', 'video_path' => 'signs/animals/CARABAO, KALABAW.mp4'],
        ['animal' => 'karabaw', 'video_path' => 'signs/animals/CARABAO, KALABAW.mp4'],
        ['animal' => 'kalabaw', 'video_path' => 'signs/animals/CARABAO, KALABAW.mp4'],
        ['animal' => 'carabao', 'video_path' => 'signs/animals/carabao.mp4'],
        ['animal' => 'cat', 'video_path' => 'signs/animals/CAT PUSA.mp4'],
        ['animal' => 'pusa', 'video_path' => 'signs/animals/CAT PUSA.mp4'],
        ['animal' => 'cat', 'video_path' => 'signs/animals/cat, pusa.mp4'],
        ['animal' => 'pusa', 'video_path' => 'signs/animals/cat, pusa.mp4'],
        ['animal' => 'chicken', 'video_path' => 'signs/animals/chicken, manok.mp4'],
        ['animal' => 'manok', 'video_path' => 'signs/animals/chicken, manok.mp4'],
        ['animal' => 'cow', 'video_path' => 'signs/animals/COW, BAKA.mp4'],
        ['animal' => 'baka', 'video_path' => 'signs/animals/COW, BAKA.mp4'],
        ['animal' => 'cow', 'video_path' => 'signs/animals/cow.mp4'],
        ['animal' => 'baka', 'video_path' => 'signs/animals/cow.mp4'],
        ['animal' => 'crocodile', 'video_path' => 'signs/animals/crocodile, buwaya.mp4'],
        ['animal' => 'buwaya', 'video_path' => 'signs/animals/crocodile, buwaya.mp4'],
        ['animal' => 'deer', 'video_path' => 'signs/animals/DEAR, OSA.mp4'],
        ['animal' => 'osa', 'video_path' => 'signs/animals/DEAR, OSA.mp4'],
        ['animal' => 'deer', 'video_path' => 'signs/animals/deer.mp4'],
        ['animal' => 'dog', 'video_path' => 'signs/animals/dog, aso.mp4'],
        ['animal' => 'aso', 'video_path' => 'signs/animals/dog, aso.mp4'],
        ['animal' => 'dog', 'video_path' => 'signs/animals/DOG, ASO.mp4'],
        ['animal' => 'aso', 'video_path' => 'signs/animals/DOG, ASO.mp4'],
        ['animal' => 'duck', 'video_path' => 'signs/animals/DUCK, PATO.mp4'],
        ['animal' => 'pato', 'video_path' => 'signs/animals/DUCK, PATO.mp4'],
        ['animal' => 'duck', 'video_path' => 'signs/animals/duck.mp4'],
        ['animal' => 'eagle', 'video_path' => 'signs/animals/eagle, agila.mp4'],
        ['animal' => 'agila', 'video_path' => 'signs/animals/eagle, agila.mp4'],
        ['animal' => 'eagle', 'video_path' => 'signs/animals/EAGLE, AGILA.mp4'],
        ['animal' => 'agila', 'video_path' => 'signs/animals/EAGLE, AGILA.mp4'],
        ['animal' => 'elephant', 'video_path' => 'signs/animals/ELEPHANT, ELEPANTE.mp4'],
        ['animal' => 'elepante', 'video_path' => 'signs/animals/ELEPHANT, ELEPANTE.mp4'],
        ['animal' => 'fish', 'video_path' => 'signs/animals/fish, isda.mp4'],
        ['animal' => 'isda', 'video_path' => 'signs/animals/fish, isda.mp4'],
        ['animal' => 'fish', 'video_path' => 'signs/animals/FISH, ISDA.mp4'],
        ['animal' => 'isda', 'video_path' => 'signs/animals/FISH, ISDA.mp4'],
        ['animal' => 'frog', 'video_path' => 'signs/animals/frog 1.mp4'],
        ['animal' => 'frog', 'video_path' => 'signs/animals/frog 2.mp4'],
        ['animal' => 'palaka', 'video_path' => 'signs/animals/frog 1.mp4'],
        ['animal' => 'palaka', 'video_path' => 'signs/animals/frog 2.mp4'],
        ['animal' => 'giraffe', 'video_path' => 'signs/animals/GIRAFFE.mp4'],
        ['animal' => 'giraffe', 'video_path' => 'signs/animals/giraffe.mp4'],
        ['animal' => 'goat', 'video_path' => 'signs/animals/goat, kambing.mp4'],
        ['animal' => 'kambing', 'video_path' => 'signs/animals/goat, kambing.mp4'],
        ['animal' => 'goat', 'video_path' => 'signs/animals/goat.mp4'],
        ['animal' => 'hen', 'video_path' => 'signs/animals/HEN, CHICKEN, MANOK.mp4'],
        ['animal' => 'chicken', 'video_path' => 'signs/animals/HEN, CHICKEN, MANOK.mp4'],
        ['animal' => 'manok', 'video_path' => 'signs/animals/HEN, CHICKEN, MANOK.mp4'],
        ['animal' => 'hen', 'video_path' => 'signs/animals/hen.mp4'],
        ['animal' => 'horse', 'video_path' => 'signs/animals/HORSE, KABAYO.mp4'],
        ['animal' => 'kabayo', 'video_path' => 'signs/animals/HORSE, KABAYO.mp4'],
        ['animal' => 'horse', 'video_path' => 'signs/animals/horse.mp4'],
        ['animal' => 'kalabaw', 'video_path' => 'signs/animals/Kalabaw (Carabao).mp4'],
        ['animal' => 'carabao', 'video_path' => 'signs/animals/Kalabaw (Carabao).mp4'],
        ['animal' => 'lamb', 'video_path' => 'signs/animals/lamb.mp4'],
        ['animal' => 'lion', 'video_path' => 'signs/animals/LION, LEON.mp4'],
        ['animal' => 'leon', 'video_path' => 'signs/animals/LION, LEON.mp4'],
        ['animal' => 'lion', 'video_path' => 'signs/animals/lion.mp4'],
        ['animal' => 'monkey', 'video_path' => 'signs/animals/monkey, unggoy.mp4'],
        ['animal' => 'unggoy', 'video_path' => 'signs/animals/monkey, unggoy.mp4'],
        ['animal' => 'monkey', 'video_path' => 'signs/animals/MONKEY, UNGGOY.mp4'],
        ['animal' => 'unggoy', 'video_path' => 'signs/animals/MONKEY, UNGGOY.mp4'],
        ['animal' => 'mosquito', 'video_path' => 'signs/animals/mosquito, lamok.mp4'],
        ['animal' => 'lamok', 'video_path' => 'signs/animals/mosquito, lamok.mp4'],
        ['animal' => 'octopus', 'video_path' => 'signs/animals/octopus.mp4'],
        ['animal' => 'pagong', 'video_path' => 'signs/animals/pagong, turtle.mp4'],
        ['animal' => 'turtle', 'video_path' => 'signs/animals/pagong, turtle.mp4'],
        ['animal' => 'pig', 'video_path' => 'signs/animals/pig, baboy.mp4'],
        ['animal' => 'baboy', 'video_path' => 'signs/animals/pig, baboy.mp4'],
        ['animal' => 'pig', 'video_path' => 'signs/animals/pig.mp4'],
        ['animal' => 'rabbit', 'video_path' => 'signs/animals/rabbit, kuneho.mp4'],
        ['animal' => 'kuneho', 'video_path' => 'signs/animals/rabbit, kuneho.mp4'],
        ['animal' => 'rabbit', 'video_path' => 'signs/animals/rabbit.mp4'],
        ['animal' => 'rat', 'video_path' => 'signs/animals/rat, daga.mp4'],
        ['animal' => 'daga', 'video_path' => 'signs/animals/rat, daga.mp4'],
        ['animal' => 'rat', 'video_path' => 'signs/animals/rat.mp4'],
        ['animal' => 'rooster', 'video_path' => 'signs/animals/rooster.mp4'],
        ['animal' => 'shark', 'video_path' => 'signs/animals/shark, pating.mp4'],
        ['animal' => 'pating', 'video_path' => 'signs/animals/shark, pating.mp4'],
        ['animal' => 'sheep', 'video_path' => 'signs/animals/sheep, tupa.mp4'],
        ['animal' => 'tupa', 'video_path' => 'signs/animals/sheep, tupa.mp4'],
        ['animal' => 'sheep', 'video_path' => 'signs/animals/sheep.mp4'],
        ['animal' => 'shrimp', 'video_path' => 'signs/animals/shrimp.mp4'],
        ['animal' => 'snail', 'video_path' => 'signs/animals/snail.mp4'],
        ['animal' => 'snake', 'video_path' => 'signs/animals/snake, ahas.mp4'],
        ['animal' => 'ahas', 'video_path' => 'signs/animals/snake, ahas.mp4'],
        ['animal' => 'snake', 'video_path' => 'signs/animals/snake.mp4'],
        ['animal' => 'spider', 'video_path' => 'signs/animals/spider, gagamba.mp4'],
        ['animal' => 'gagamba', 'video_path' => 'signs/animals/spider, gagamba.mp4'],
        ['animal' => 'tiger', 'video_path' => 'signs/animals/tiger, tigre.mp4'],
        ['animal' => 'tigre', 'video_path' => 'signs/animals/tiger, tigre.mp4'],
        ['animal' => 'turkey', 'video_path' => 'signs/animals/turkey bird.mp4'],
        ['animal' => 'bird', 'video_path' => 'signs/animals/turkey bird.mp4'],
        ['animal' => 'turtle', 'video_path' => 'signs/animals/turtle pagong.mp4'],
        ['animal' => 'pagong', 'video_path' => 'signs/animals/turtle pagong.mp4'],
        ['animal' => 'whale', 'video_path' => 'signs/animals/whale.mp4'],
        ['animal' => 'balyena', 'video_path' => 'signs/animals/whale.mp4'],
        ['animal' => 'worm', 'video_path' => 'signs/animals/WORM, UOD.mp4'],
        ['animal' => 'uod', 'video_path' => 'signs/animals/WORM, UOD.mp4'],
        ['animal' => 'zebra', 'video_path' => 'signs/animals/ZEBRA.mp4'],
        ['animal' => 'zebra', 'video_path' => 'signs/animals/zebra (10).mp4'],
        ['animal' => 'zebra', 'video_path' => 'signs/animals/ZEBRA.mp4'],
        ['animal' => 'zebra', 'video_path' => 'signs/animals/zebra (10).mp4'],





        // Add more animals as needed
    ];

    // Insert animals into the database
    foreach ($animals as $animal) {
        animal::create([
            'animal' => $animal['animal'],
            'video_path' => $animal['video_path'],
        ]);
    }
    }
}
