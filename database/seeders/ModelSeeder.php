<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model; 
use App\Models\Maker;

class ModelSeeder extends Seeder
{

    const MODELS = [
        'Toyota' => ['Corolla', 'Cumbry', 'Prius'],
        'Ford' => ['Mustang', 'Focus', 'Mondeo', 'Kuga'],
        'BMW' => ['I3', 'M3', '750I', 'I8'],
        'Mercedes-Benz' => ['SLK', 'CLX'],
        'Honda' => ['Civic', 'Legend', 'Accord'],
        'Volkswagen' => ['Golf', 'Passat'],
        'Audi' => ['A3', 'A4', 'A5'],
        'Nissan' =>['Leaf', 'Micra'],
        'Chevrolet'=>['Tahoe', 'Silverado'],
        'Hyundai'=>['Tucson', 'Palisade', 'Santa Fe'],
        'Tesla'=>['Cybertuck', 'Powerwall'],
        'Porsche'=>['Macan', 'Cayman'],
        'Jaguar'=> ['XJ13', 'Pirana'],
        'Ferrari' => ['Portofino', 'F12 Berlinetta'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::MODELS as $makerName => $modelNames) {
            
            $maker = Maker::where('name', $makerName)->first();

            if ($maker) {
                foreach ($modelNames as $modelName) {
                    $model = new Model();
                    $model->name = $modelName;
                    $model->maker_id = $maker->id; 
                    $model->save();
                }
            } 
        }
    }
}