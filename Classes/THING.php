<?php

class car{
    //properties / Fields there the varibales
    private string $brand;
    private $color;
    public $VehicleType = "Car";

    //Constructors are used to assign data to the propeties
    public function __construct($brand, $color = "none")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    //Getter & Setter Methods
    public function getBrand(){
        return $this->brand;
        //this is a getter which means it get the value for us to print derictly
    }

    public function setBrand($brand){
        $allowedbrands = [
            "BMW",
            "Volvo",
            "Merced",
            "dacia" 
        ];
        if(in_array($brand, $allowedbrands)){
            $this->brand = $brand;
        }
        //this is a setter used to change value
    }


    //Method
    public function getCarinfo(){
        return "Brand : " . $this->brand . " ,color :" . $this->color;
    }

}
  