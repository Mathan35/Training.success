<?php


class Laptop{

    public $ram;
    public $storage;

    public $screenSize;

    public $modal;


    function __construct(){

        // $this->$color = "red";
        $this->modal = "inspiration 3511";
    }

    function getRam($ram){
        return $this->ram = $ram;
    }

    function getStorage(){
        return $this->storage = '512gb';
    }


    function screenSize(){
        return $this->screenSize = '15.6 inch';
    }

    //clearing memory
    // function __destruct(){
    //     echo "clear memory";
    // }

}



$dell = new Laptop();

echo $dell->getRam('16gb')."\n";

echo $dell->getStorage()."\n";

echo $dell->screenSize()."\n";

// echo json_decode($dell);


class Car extends Laptop{


}
$car = new Car();
echo $car->getRam('12');







//Abstract class (we ca jus declare and must use)

abstract class Otherman{
    public $passport;

    abstract function getPassport();
}

class Country extends Otherman{

    function getPassport(){
        return $this->passport = "374882yhiu";
    }
}

$country = new Country;

echo $country->getPassport()."\n";



//Interface (no property declaration and we must use this function)

interface Interface1{

    function getAdress();
}

class Home implements Interface1{
    
    function getAdress(){
        return "erode";
    }
}

$home = new Home;
echo $home->getAdress()."\n";





//Traits (we can use "use Trait name")

trait Bus{
    function ticket(){
        return 10;
    }
}

class Area{
    use Bus;  //we can include trait like this
}
$area = new Area;

echo "traits"."\n";

echo $area->ticket()."\n";





//static
class Calculate{
    static $number = 10;
    static function add($a,$b){
        // return self::$number;
        return $a+$b;
    }
}
echo "static function"."\n";
echo Calculate::add(10,20)."\n";
echo Calculate::$number;
?>




