<?php

use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefectures = array(
            array('id' => '1','name' => '北海道','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => '青森県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => '岩手県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => '宮城県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => '秋田県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => '山形県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => '福島県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => '茨城県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => '栃木県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => '群馬県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => '埼玉県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','name' => '千葉県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','name' => '東京都','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','name' => '神奈川県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => '新潟県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','name' => '富山県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','name' => '石川県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','name' => '福井県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','name' => '山梨県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => '長野県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','name' => '岐阜県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','name' => '静岡県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => '愛知県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','name' => '三重県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => '滋賀県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','name' => '京都府','created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','name' => '大阪府','created_at' => NULL,'updated_at' => NULL),
            array('id' => '28','name' => '兵庫県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','name' => '奈良県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '30','name' => '和歌山県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '31','name' => '鳥取県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','name' => '島根県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '33','name' => '岡山県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '34','name' => '広島県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '35','name' => '山口県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '36','name' => '徳島県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '37','name' => '香川県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '38','name' => '愛媛県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '39','name' => '高知県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '40','name' => '福岡県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '41','name' => '佐賀県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '42','name' => '長崎県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '43','name' => '熊本県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '44','name' => '大分県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '45','name' => '宮崎県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '46','name' => '鹿児島県','created_at' => NULL,'updated_at' => NULL),
            array('id' => '47','name' => '沖縄県','created_at' => NULL,'updated_at' => NULL)
          );          

        DB::table('prefectures')->insert($prefectures);
    }
}
