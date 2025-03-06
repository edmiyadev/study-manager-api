<?php

namespace Database\Seeders;

use App\Enums\TypeEducationEnum;
use App\Models\TypeEducation;
use Illuminate\Database\Seeder;


class TypeEducationSeeder extends Seeder
{
    public function run(): void
    {
        foreach (TypeEducationEnum::cases() as $key => $value) {
            TypeEducation::query()->createOrFirst(['name' => $value]);
        }
    }
}
