<?php

abstract class House
{
    abstract protected function getHouseName();

    abstract protected function getHouseMotto();

    abstract protected function getHouseSeat();

    public function introduce()
    {
        printf('House %s of %s : "%s"' . PHP_EOL, $this->getHouseName(), $this->getHouseSeat(), $this->getHouseMotto());

    }
}