<?php

require_once 'Color.class.php';

class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;
    static $verbose = FALSE;

    public function setX($n) {
        $this->_x = $n;
        return;
    }

    public function getX() {
        return($this->_x);
    }

    public function setY($n) {
        $this->_y = $n;
        return;
    }

    public function getY() {
        return($this->_y);
    }

    public function setZ($n) {
        $this->_z = $n;
        return;
    }

    public function getZ() {
        return($this->_z);
    }

    public function setW($n) {
        $this->_w = $n;
        return;
    }

    public function getW() {
        return($this->_w);
    }

    public function setColor($n) {
        $this->_color = $n;
        return;
    }

    public function getColor() {
        return($this->_color);
    }

    function __construct(array $coord) {
        if (array_key_exists('x', $coord) && array_key_exists('y', $coord) && array_key_exists('y', $coord)) {
            $this->setX($coord['x']);
            $this->setY($coord['y']);
            $this->setZ($coord['z']);
        }
        if (array_key_exists('w', $coord)) {
            $this->setW($coord['w']);
        }
        if (array_key_exists('color', $coord)) {
            $this->setColor($coord['color']);
        }
        else {
            $this->setColor(new Color(array('rgb'=>'0xffffff')));
        }
        if (self::$verbose){
            printf ( "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
        }
        return;
    }

    function __destruct() {
        if (self::$verbose){
            printf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
        }
        return;
    }

    public function __toString() {
        if (self::$verbose) {
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()));
        }
        else {
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
        }
    }

    static function doc () {
        echo "\n", file_get_contents("Vertex.doc.txt"), "\n";
    }
}?>