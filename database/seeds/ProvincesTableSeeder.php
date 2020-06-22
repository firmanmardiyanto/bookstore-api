<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url_province = "https://api.rajaongkir.com/starter/province?key=0e5cb9f78239823f7a2e20b763e1da35";
        $json_str = file_get_contents($url_province);
        $json_obj = json_decode($json_str);
        $provinces = [];
        foreach ($json_obj->rajaongkir->results as $province) {
            $provinces[] = [
                'id' => $province->province_id, 
                'province' => $province->province
            ];
        }
        DB::table('provinces')->insert($provinces);
    }
}
