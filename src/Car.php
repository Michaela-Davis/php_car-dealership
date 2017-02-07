<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

    function __construct($make_model, $price, $miles, $picture)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->picture = $picture;
    }

    function getPrice()
    {
        return $this->price;
    }
    function setPrice($newPrice)
    {
        $floatPrice = (float) $newPrice;
        $this->price = $floatPrice;
    }

    function getMake_Model()
    {
        return $this->make_model;
    }
    function setMake_Model($newMake_model)
    {
        $this->make_model = $newMake_model;
    }
    function getMiles()
    {
        return $this->miles;
    }
    function setMiles($newMiles)
    {
        $floatMiles = (float) $newMiles;
        $this->miles = $floatMiles;
    }
    function getPicture()
    {
        return $this->picture;
    }
    function setPicture($picture_path)
    {
        $this->picture = $picture_path;
    }

}
?>
