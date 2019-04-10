<?php


class Color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = FALSE;

    function __construct(array $col) {
        if (array_key_exists('rgb', $col)) {
            $this->red = (intval($col['rgb'], 0) / 65536) % 256;
            $this->green = (intval($col['rgb'], 0) / 256) % 256;
            $this->blue = intval($col['rgb'], 0) % 256;
        }
        elseif (array_key_exists('red', $col) && array_key_exists('green', $col) && array_key_exists('blue', $col)) {
            $this->red = intval($col['red'], 0) % 256;
            $this->green = intval($col['green'], 0) % 256;
            $this->blue = intval($col['blue'], 0) % 256;
        }
        if (self::$verbose){
            printf ( "Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
        }
        return;
    }

    function __destruct() {
        if (self::$verbose){
            printf ( "Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
        }
        return;
    }

    public function __toString() {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    static function doc () {
        echo "\n", file_get_contents("Color.doc.txt"), "\n";
    }

    function add(Color $tmp) {
        return (new Color(array('red'=>$this->red + $tmp->red, 'green'=>$this->green + $tmp->green, 'blue'=>$this->blue + $tmp->blue)));
    }

    function sub(Color $tmp) {
        return (new Color(array('red'=>$this->red - $tmp->red, 'green'=>$this->green - $tmp->green, 'blue'=>$this->blue - $tmp->blue)));
    }

    function mult($n) {
        return (new Color(array('red'=>$this->red * $n, 'green'=>$this->green * $n, 'blue'=>$this->blue * $n)));
    }
}?>