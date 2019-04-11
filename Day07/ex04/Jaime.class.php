<?php

class Jaime {
    public function sleepWith($person){
        if ($person instanceof Tyrion || $person instanceof Jaime) {
            printf("Not even if I'm drunk !\n");
        }
        else if ($person instanceof Sansa) {
            printf("Let's do this.\n");
        }
        else if ($person instanceof Cersei) {
            printf("With pleasure, but only in a tower in Winterfell, then.\n");
        }
    }
}
?>