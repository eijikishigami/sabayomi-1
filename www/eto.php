<?php
class Eto {
    private $name;       // 干支名
    private $surplus;    // 剰余。干支を割り出すために使用

    public function __construct($name, $surplus) {
        $this->name = $name;
        $this->surplus = $surplus;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_surplus() {
        return $this->surplus;
    }
}
?>
