<?php

class UnholyFactory {
    public $unit_obj = array();

    public function absorb($unit) {
        if ($unit instanceof Fighter) {
            if (!array_key_exists($unit->getUnitName(), $this->unit_obj)) {
                $this->unit_obj[$unit->getUnitName()] = $unit;
                printf("(Factory absorbed a fighter of type %s)" . PHP_EOL, $unit->getUnitName());
            }
            else {
                printf("(Factory already absorbed a fighter of type %s)" . PHP_EOL, $unit->getUnitName());
            }
        }
        else {
            printf("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        }
    }

    public function fabricate($unit_str) {
        if(array_key_exists($unit_str, $this->unit_obj)) {
            printf("(Factory fabricates a fighter of type %s)" . PHP_EOL, $unit_str);
            return (($this->unit_obj[$unit_str]));
        }
        else {
            printf("(Factory hasn't absorbed any fighter of type %s)" . PHP_EOL, $unit_str);
            return (FALSE);
        }
    }
}
?>

