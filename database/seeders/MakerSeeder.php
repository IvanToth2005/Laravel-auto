<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maker;

class MakerSeeder extends Seeder
{
    const MAKERS = [
        'Toyota',
        'Ford',
        'BMW',
        'Mercedes-Benz',
        'Honda',
        'Volkswagen',
        'Audi',
        'Nissan',
        'Chevrolet',
        'Hyundai',
        'Tesla',
        'Porsche',
        'Jaguar',
        'Ferrari',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::MAKERS as $makers) {
            $maker = new Maker();
            $maker->name = $makers;
            $maker->save();
        }


    }
}
