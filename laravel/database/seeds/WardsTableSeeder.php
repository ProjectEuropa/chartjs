<?php

use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wards = array(
            array('id' => '1','city_id' => '1','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','city_id' => '1','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','city_id' => '1','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','city_id' => '1','name' => '白石区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','city_id' => '1','name' => '豊平区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','city_id' => '1','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','city_id' => '1','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','city_id' => '1','name' => '厚別区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','city_id' => '1','name' => '手稲区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','city_id' => '1','name' => '清田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','city_id' => '253','name' => '青葉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','city_id' => '253','name' => '宮城野区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','city_id' => '253','name' => '若林区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','city_id' => '253','name' => '太白区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','city_id' => '253','name' => '泉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','city_id' => '511','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','city_id' => '511','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','city_id' => '511','name' => '大宮区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','city_id' => '511','name' => '見沼区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','city_id' => '511','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','city_id' => '511','name' => '桜区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','city_id' => '511','name' => '浦和区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','city_id' => '511','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','city_id' => '511','name' => '緑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','city_id' => '511','name' => '岩槻区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','city_id' => '574','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','city_id' => '574','name' => '花見川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '28','city_id' => '574','name' => '稲毛区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','city_id' => '574','name' => '若葉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '30','city_id' => '574','name' => '緑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '31','city_id' => '574','name' => '美浜区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','city_id' => '628','name' => '千代田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '33','city_id' => '628','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '34','city_id' => '628','name' => '港区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '35','city_id' => '628','name' => '新宿区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '36','city_id' => '628','name' => '文京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '37','city_id' => '628','name' => '台東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '38','city_id' => '628','name' => '墨田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '39','city_id' => '628','name' => '江東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '40','city_id' => '628','name' => '品川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '41','city_id' => '628','name' => '目黒区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '42','city_id' => '628','name' => '大田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '43','city_id' => '628','name' => '世田谷区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '44','city_id' => '628','name' => '渋谷区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '45','city_id' => '628','name' => '中野区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '46','city_id' => '628','name' => '杉並区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '47','city_id' => '628','name' => '豊島区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '48','city_id' => '628','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '49','city_id' => '628','name' => '荒川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '50','city_id' => '628','name' => '板橋区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '51','city_id' => '628','name' => '練馬区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '52','city_id' => '628','name' => '足立区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '53','city_id' => '628','name' => '葛飾区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '54','city_id' => '628','name' => '江戸川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '55','city_id' => '668','name' => '鶴見区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '56','city_id' => '668','name' => '神奈川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '57','city_id' => '668','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '58','city_id' => '668','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '59','city_id' => '668','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '60','city_id' => '668','name' => '保土ケ谷区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '61','city_id' => '668','name' => '磯子区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '62','city_id' => '668','name' => '金沢区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '63','city_id' => '668','name' => '港北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '64','city_id' => '668','name' => '戸塚区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '65','city_id' => '668','name' => '港南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '66','city_id' => '668','name' => '旭区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '67','city_id' => '668','name' => '緑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '68','city_id' => '668','name' => '瀬谷区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '69','city_id' => '668','name' => '栄区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '70','city_id' => '668','name' => '泉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '71','city_id' => '668','name' => '青葉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '72','city_id' => '668','name' => '都筑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '73','city_id' => '669','name' => '川崎区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '74','city_id' => '669','name' => '幸区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '75','city_id' => '669','name' => '中原区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '76','city_id' => '669','name' => '高津区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '77','city_id' => '669','name' => '多摩区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '78','city_id' => '669','name' => '宮前区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '79','city_id' => '669','name' => '麻生区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '80','city_id' => '670','name' => '緑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '81','city_id' => '670','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '82','city_id' => '670','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '83','city_id' => '701','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '84','city_id' => '701','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '85','city_id' => '701','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '86','city_id' => '701','name' => '江南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '87','city_id' => '701','name' => '秋葉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '88','city_id' => '701','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '89','city_id' => '701','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '90','city_id' => '701','name' => '西蒲区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '91','city_id' => '928','name' => '葵区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '92','city_id' => '928','name' => '駿河区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '93','city_id' => '928','name' => '清水区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '94','city_id' => '929','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '95','city_id' => '929','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '96','city_id' => '929','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '97','city_id' => '929','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '98','city_id' => '929','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '99','city_id' => '929','name' => '浜北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '100','city_id' => '929','name' => '天竜区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '101','city_id' => '963','name' => '千種区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '102','city_id' => '963','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '103','city_id' => '963','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '104','city_id' => '963','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '105','city_id' => '963','name' => '中村区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '106','city_id' => '963','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '107','city_id' => '963','name' => '昭和区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '108','city_id' => '963','name' => '瑞穂区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '109','city_id' => '963','name' => '熱田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '110','city_id' => '963','name' => '中川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '111','city_id' => '963','name' => '港区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '112','city_id' => '963','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '113','city_id' => '963','name' => '守山区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '114','city_id' => '963','name' => '緑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '115','city_id' => '963','name' => '名東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '116','city_id' => '963','name' => '天白区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '117','city_id' => '1065','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '118','city_id' => '1065','name' => '上京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '119','city_id' => '1065','name' => '左京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '120','city_id' => '1065','name' => '中京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '121','city_id' => '1065','name' => '東山区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '122','city_id' => '1065','name' => '下京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '123','city_id' => '1065','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '124','city_id' => '1065','name' => '右京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '125','city_id' => '1065','name' => '伏見区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '126','city_id' => '1065','name' => '山科区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '127','city_id' => '1065','name' => '西京区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '128','city_id' => '1091','name' => '都島区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '129','city_id' => '1091','name' => '福島区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '130','city_id' => '1091','name' => '此花区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '131','city_id' => '1091','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '132','city_id' => '1091','name' => '港区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '133','city_id' => '1091','name' => '大正区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '134','city_id' => '1091','name' => '天王寺区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '135','city_id' => '1091','name' => '浪速区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '136','city_id' => '1091','name' => '西淀川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '137','city_id' => '1091','name' => '東淀川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '138','city_id' => '1091','name' => '東成区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '139','city_id' => '1091','name' => '生野区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '140','city_id' => '1091','name' => '旭区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '141','city_id' => '1091','name' => '城東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '142','city_id' => '1091','name' => '阿倍野区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '143','city_id' => '1091','name' => '住吉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '144','city_id' => '1091','name' => '東住吉区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '145','city_id' => '1091','name' => '西成区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '146','city_id' => '1091','name' => '淀川区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '147','city_id' => '1091','name' => '鶴見区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '148','city_id' => '1091','name' => '住之江区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '149','city_id' => '1091','name' => '平野区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '150','city_id' => '1091','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '151','city_id' => '1091','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '152','city_id' => '1092','name' => '堺区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '153','city_id' => '1092','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '154','city_id' => '1092','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '155','city_id' => '1092','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '156','city_id' => '1092','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '157','city_id' => '1092','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '158','city_id' => '1092','name' => '美原区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '159','city_id' => '1134','name' => '東灘区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '160','city_id' => '1134','name' => '灘区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '161','city_id' => '1134','name' => '兵庫区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '162','city_id' => '1134','name' => '長田区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '163','city_id' => '1134','name' => '須磨区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '164','city_id' => '1134','name' => '垂水区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '165','city_id' => '1134','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '166','city_id' => '1134','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '167','city_id' => '1134','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '168','city_id' => '1283','name' => '北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '169','city_id' => '1283','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '170','city_id' => '1283','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '171','city_id' => '1283','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '172','city_id' => '1310','name' => '中区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '173','city_id' => '1310','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '174','city_id' => '1310','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '175','city_id' => '1310','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '176','city_id' => '1310','name' => '安佐南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '177','city_id' => '1310','name' => '安佐北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '178','city_id' => '1310','name' => '安芸区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '179','city_id' => '1310','name' => '佐伯区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '180','city_id' => '1448','name' => '門司区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '181','city_id' => '1448','name' => '若松区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '182','city_id' => '1448','name' => '戸畑区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '183','city_id' => '1448','name' => '小倉北区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '184','city_id' => '1448','name' => '小倉南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '185','city_id' => '1448','name' => '八幡東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '186','city_id' => '1448','name' => '八幡西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '187','city_id' => '1447','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '188','city_id' => '1447','name' => '博多区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '189','city_id' => '1447','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '190','city_id' => '1447','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '191','city_id' => '1447','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '192','city_id' => '1447','name' => '城南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '193','city_id' => '1447','name' => '早良区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '194','city_id' => '1548','name' => '中央区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '195','city_id' => '1548','name' => '東区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '196','city_id' => '1548','name' => '西区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '197','city_id' => '1548','name' => '南区','created_at' => NULL,'updated_at' => NULL),
            array('id' => '198','city_id' => '1548','name' => '北区','created_at' => NULL,'updated_at' => NULL)
          );

        DB::table('wards')->insert($wards);
    }
}
