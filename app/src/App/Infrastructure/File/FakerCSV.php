<?php

declare(strict_types=1);

namespace Palina\App\Infrastructure\File;

use Faker\Factory;

class FakerCSV
{
    public function fakeCSV(int $rowCount): void
    {
        $faker = Factory::create();
        $csvFilePath = dirname(__DIR__, 4).'/resources/FakerResources/user-data.csv';
        $file = fopen($csvFilePath, 'w');
        $header = ['country', 'city', 'isActive', 'gender', 'birthDate', 'salary', 'hasChildren', 'familyStatus', 'registrationDate'];
        fputcsv($file, $header);
        for ($i = 0; $i < $rowCount; ++$i) {
            $row = [
                $faker->country,
                $faker->city,
                $faker->boolean() ? 'true' : 'false',
                $faker->randomElement(['Male', 'Female', 'Genderfluid', 'Nonbinary', 'Transgender',
                    'Gender nonconforming', 'Bigender']),
                $faker->date,
                $faker->randomFloat(2, 1000, 10000),
                $faker->boolean() ? 'true' : 'false',
                $faker->randomElement(['single', 'married', 'divorced']),
                $faker->date,
            ];
            fputcsv($file, $row);
        }
        fclose($file);
    }
}
