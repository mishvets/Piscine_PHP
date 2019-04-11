<?php

class Fighter {

    private $_unit_name;

    public function __construct($str) {
        $this->setUnitName($str);
    }

    public function setUnitName($str) {
        $this->_unit_name = $str;
        return;
    }

    public function getUnitName() {
        return ($this->_unit_name);
    }
}

?>