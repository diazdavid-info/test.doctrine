<?php

namespace foo\mapping;

abstract class Car
{
    /** @var int */
    private $id;
    /** @var string */
    private $make;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param string $make
     */
    public function setMake($make)
    {
        $this->make = $make;
    }
}