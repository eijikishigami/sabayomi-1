<?php
class Convertible_Year {
    private $year_west;

    public function __construct($year_west) {
        $this->year_west = $year_west;
    }

    // 西暦年取得
    public function get_west() {
        return $this->year_west;
    }

    // 和暦年取得
    public function get_jp() {
        $eras = [
            ['year' => 2018, 'name' => '令和'],
            ['year' => 1988, 'name' => '平成'],
            ['year' => 1925, 'name' => '昭和'],
            ['year' => 1911, 'name' => '大正'],
            ['year' => 1867, 'name' => '明治']
        ];
    
        foreach($eras as $era) {
            $base_year = $era['year'];
            $era_name = $era['name'];

            if($this->year_west > $base_year) {
                $era_year = $this->year_west - $base_year;
                if($era_year === 1) {
                    return $era_name .'元年';    
                }
                return $era_name . $era_year . '年';
            }
        }
    }
}

?>