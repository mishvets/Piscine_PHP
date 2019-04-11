<?php

class NightsWatch implements IFighter {

    public $arr = array();

    public function recruit($unit) {
        if (method_exists(get_class($unit), 'fight')) {
            $this->arr[] = $unit;
        }
    }

    public function fight() {
        foreach ($this->arr as $var) {
            $var->fight();
        }
    }
}
?>