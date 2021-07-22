<?php

namespace Database\Seeders;

use App\Models\Declaration;
use Illuminate\Database\Seeder;

class DeclarationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1 ; $x<25; $x++ )
        {
            Declaration::create([
                "name" => "$x Прыжок с парашютом алматы",
                "description" => "Прыжок проходит в группе. Инструктора – мастера спорта по парашютному спорту. Парашюты укладывают профессионалы, возможность ошибки – исключена. Круглый десантный парашют Д-1-5у – самый надежный в мире. При прыжке парашют настроен на самостоятельное раскрытие. Вдобавок к основному – запасной парашют, который в случае необходимости срабатывает автоматически.",
                "price" => rand(1,10000),
                "img_path" => "/images/cards/parashut.jpg"
            ]);
        }
    }
}
