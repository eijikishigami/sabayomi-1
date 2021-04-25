<?php
require_once('eto.php');

class Culc_Eto {
    public static function culc(int $year): Eto {
        $eto_list = [
            new Eto("子(ねずみ)", 4),
            new Eto("丑(うし)", 5),
            new Eto("寅(とら)", 6),
            new Eto("卯(うさぎ)", 7),
            new Eto("辰(たつ)", 8),
            new Eto("巳(へび)", 9),
            new Eto("午(うま)", 10),
            new Eto("未(ひつじ)", 11),
            new Eto("申(さる)", 0),
            new Eto("酉(とり)", 1),
            new Eto("戌(いぬ)", 2),
            new Eto("亥(いのしし)", 3)
        ];

        $surplus = $year % 12;
        foreach ($eto_list as $eto) {
            if ($surplus === $eto->get_surplus()) {
                return $eto;
            }
        }
    }
}
?>
