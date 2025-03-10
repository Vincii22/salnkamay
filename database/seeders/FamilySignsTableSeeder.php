<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FamilySigns;

class FamilySignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Sample numbers and their video filenames
       $family_signs = [
        ['family_sign' => 'Ampon', 'video_path' => 'signs/family signs/ampon adopt adopted.mp4'],
        ['family_sign' => 'Adopt', 'video_path' => 'signs/family signs/1ampon adopt adopted.mp4'],
        ['family_sign' => 'Adopted', 'video_path' => 'signs/family signs/ampon adopt adopted.mp4'],
        ['family_sign' => 'Anak na babae', 'video_path' => 'signs/family signs/anak na babae daughter.mp4'],
        ['family_sign' => 'Daughter', 'video_path' => 'signs/family signs/anak na babae daughter.mp4'],
        ['family_sign' => 'Anak na lalaki', 'video_path' => 'signs/family signs/anak na lalaki son.mp4'],
        ['family_sign' => 'Son', 'video_path' => 'signs/family signs/anak na lalaki son.mp4'],
        ['family_sign' => 'Apo', 'video_path' => 'signs/family signs/apo grandchild.mp4'],
        ['family_sign' => 'Grandchild', 'video_path' => 'signs/family signs/apo grandchild.mp4'],
        ['family_sign' => 'Grand child', 'video_path' => 'signs/family signs/apo grandchild.mp4'],
        ['family_sign' => 'Asawang Bababe', 'video_path' => 'signs/family signs/asawang babae wife asawa.mp4'],
        ['family_sign' => 'Wife', 'video_path' => 'signs/family signs/asawang babae wife asawa.mp4'],
        ['family_sign' => 'Asawa', 'video_path' => 'signs/family signs/asawang babae wife asawa.mp4'],
        ['family_sign' => 'Asawang lalaki', 'video_path' => 'signs/family signs/asawang lalaki husband asawa.mp4'],
        ['family_sign' => 'Husband', 'video_path' => 'signs/family signs/asawang lalaki husband asawa.mp4'],
        ['family_sign' => 'Asawa', 'video_path' => 'signs/family signs/asawang lalaki husband asawa.mp4'],
        ['family_sign' => 'Ate', 'video_path' => 'signs/family signs/ate sister.mp4'],
        ['family_sign' => 'Sister', 'video_path' => 'signs/family signs/ate sister.mp4'],
        ['family_sign' => 'Bata', 'video_path' => 'signs/family signs/bata child.mp4'],
        ['family_sign' => 'Child', 'video_path' => 'signs/family signs/bata child.mp4'],
        ['family_sign' => 'Buntis', 'video_path' => 'signs/family signs/buntis pregnant.mp4'],
        ['family_sign' => 'Pregnant', 'video_path' => 'signs/family signs/buntis pregnant.mp4'],
        ['family_sign' => 'Kasal', 'video_path' => 'signs/family signs/kasal wedding.mp4'],
        ['family_sign' => 'Wedding', 'video_path' => 'signs/family signs/kasal wedding.mp4'],
        ['family_sign' => 'Kinupkop', 'video_path' => 'signs/family signs/kinupkop fostered.mp4'],
        ['family_sign' => 'Fostered', 'video_path' => 'signs/family signs/kinupkop fostered.mp4'],
        ['family_sign' => 'Kuya', 'video_path' => 'signs/family signs/kuya brother.mp4'],
        ['family_sign' => 'Brother', 'video_path' => 'signs/family signs/kuya brother.mp4'],
        ['family_sign' => 'Lola', 'video_path' => 'signs/family signs/lola granda grandmother.mp4'],
        ['family_sign' => 'Grandma', 'video_path' => 'signs/family signs/lola granda grandmother.mp4'],
        ['family_sign' => 'Grandmother', 'video_path' => 'signs/family signs/lola granda grandmother.mp4'],
        ['family_sign' => 'Grand mother', 'video_path' => 'signs/family signs/lola granda grandmother.mp4'],
        ['family_sign' => 'Lolo', 'video_path' => 'signs/family signs/lolo grandpa grandfather.mp4'],
        ['family_sign' => 'Grandpa', 'video_path' => 'signs/family signs/lolo grandpa grandfather.mp4'],
        ['family_sign' => 'Grandfather', 'video_path' => 'signs/family signs/lolo grandpa grandfather.mp4'],
        ['family_sign' => 'Magulang', 'video_path' => 'signs/family signs/magulang parents.mp4'],
        ['family_sign' => 'Parents', 'video_path' => 'signs/family signs/magulang parents.mp4'],
        ['family_sign' => 'Mama', 'video_path' => 'signs/family signs/mama mother nanay.mp4'],
        ['family_sign' => 'Mommy', 'video_path' => 'signs/family signs/mama mother nanay.mp4'],
        ['family_sign' => 'Mother', 'video_path' => 'signs/family signs/mama mother nanay.mp4'],
        ['family_sign' => 'Nanay', 'video_path' => 'signs/family signs/mama mother nanay.mp4'],
        ['family_sign' => 'Mga Bata', 'video_path' => 'signs/family signs/mga bata children.mp4'],
        ['family_sign' => 'Children', 'video_path' => 'signs/family signs/mga bata children.mp4'],
        ['family_sign' => 'Ninang', 'video_path' => 'signs/family signs/ninang godmother.mp4'],
        ['family_sign' => 'Godmother', 'video_path' => 'signs/family signs/ninang godmother.mp4'],
        ['family_sign' => 'Ninong', 'video_path' => 'signs/family signs/ninong godfather.mp4'],
        ['family_sign' => 'Godfather', 'video_path' => 'signs/family signs/ninong godfather.mp4'],
        ['family_sign' => 'Oo', 'video_path' => 'signs/family signs/oo.mp4'],
        ['family_sign' => 'Opo', 'video_path' => 'signs/family signs/opo oo yes.mp4'],
        ['family_sign' => 'Yes', 'video_path' => 'signs/family signs/opo oo yes.mp4'],
        ['family_sign' => 'Pamangking babae', 'video_path' => 'signs/family signs/pamangking babae niece.mp4'],
        ['family_sign' => 'Pamangkin', 'video_path' => 'signs/family signs/pamangking babae niece.mp4'],
        ['family_sign' => 'Niece', 'video_path' => 'signs/family signs/pamangking babae niece.mp4'],
        ['family_sign' => 'Pamangking Lalaki', 'video_path' => 'signs/family signs/pamangking lalaki nephew.mp4'],
        ['family_sign' => 'Pamangkin', 'video_path' => 'signs/family signs/pamangking lalaki nephew.mp4'],
        ['family_sign' => 'Nephew', 'video_path' => 'signs/family signs/pamangking lalaki nephew.mp4'],
        ['family_sign' => 'Pamilya', 'video_path' => 'signs/family signs/pamilya family.mp4'],
        ['family_sign' => 'Family', 'video_path' => 'signs/family signs/pamilya family.mp4'],
        ['family_sign' => 'Papa', 'video_path' => 'signs/family signs/papa father tatay.mp4'],
        ['family_sign' => 'Father', 'video_path' => 'signs/family signs/papa father tatay.mp4'],
        ['family_sign' => 'Tatay', 'video_path' => 'signs/family signs/papa father tatay.mp4'],
        ['family_sign' => 'Daddy', 'video_path' => 'signs/family signs/papa father tatay.mp4'],
        ['family_sign' => 'Pinsan', 'video_path' => 'signs/family signs/pinsan cousin.mp4'],
        ['family_sign' => 'Cousin', 'video_path' => 'signs/family signs/pinsan cousin.mp4'],
        ['family_sign' => 'Sanggol', 'video_path' => 'signs/family signs/sanggol baby.mp4'],
        ['family_sign' => 'Baby', 'video_path' => 'signs/family signs/sanggol baby.mp4'],
        ['family_sign' => 'Step Brother', 'video_path' => 'signs/family signs/step brother.mp4'],
        ['family_sign' => 'Step Sister', 'video_path' => 'signs/family signs/step sister.mp4'],
        ['family_sign' => 'Teenager', 'video_path' => 'signs/family signs/teenager teen binata dalaga.mp4'],
        ['family_sign' => 'Teen', 'video_path' => 'signs/family signs/teenager teen binata dalaga.mp4'],
        ['family_sign' => 'Binata', 'video_path' => 'signs/family signs/teenager teen binata dalaga.mp4'],
        ['family_sign' => 'Dalaga', 'video_path' => 'signs/family signs/teenager teen binata dalaga.mp4'],
        ['family_sign' => 'Tita', 'video_path' => 'signs/family signs/tita aunt.mp4'],
        ['family_sign' => 'Aunt', 'video_path' => 'signs/family signs/tita aunt.mp4'],
        ['family_sign' => 'Auntie', 'video_path' => 'signs/family signs/tita aunt.mp4'],
        ['family_sign' => 'Tito', 'video_path' => 'signs/family signs/tito uncle.mp4'],
        ['family_sign' => 'Uncle', 'video_path' => 'signs/family signs/tito uncle.mp4'],

        // Add more numbers as needed
    ];

    // Insert numbers into the database
    foreach ($family_signs as $family_sign) {
        FamilySigns::create([
            'family_sign' => $family_sign['family_sign'],
            'video_path' => $family_sign['video_path'],
        ]);
    }
    }
}
