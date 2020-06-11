<?php
    class Car {
        public $x = 40;
        private $y = 100;
        protected $z = 999;
        //建構子
        function __construct(){
            echo "hello php!!";
        }
        public function test(){
            return $this->z;
        }
    }

    // $benz = new Car;
    // echo $benz->y;
    // echo $benz->test();
    // echo $benz->z;

    //繼承
    class Truck extends Car {
        function qq(){
            return $this->z;
        }
    }
    $benz = new Truck;
    // echo $benz->z;
    // echo $benz->qq();
    $nissan = new Car;
    $bmw = new Car;
