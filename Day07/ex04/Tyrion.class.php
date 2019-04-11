<?php

class Tyrion extends Lannister {
    public function sleepWith($person){
        if ($person instanceof Jaime || $person instanceof Cersei) {
            printf("Not even if I'm drunk !\n");
        }
        else if ($person instanceof Sansa) {
            printf("Let's do this.\n");
        }
    }
}
?>