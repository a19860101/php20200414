<?php
    class Car {
        //屬性
        public $door = 4;
        public $color = "white";
        //方法
        public function move(){
            return 'go';
            // echo 'go';
        }
        public function changeColor($color){
            $this->color = $color;
            return $this->color;
        }
        public function hello(){
            return $this->color;
        }
        //靜態方法
        static function title($s){
            return "hello {$s}";
        }
        static function calc($x,$y){
            return $x*$y;
        }
    }

    //建立實例
    // $benz = new Car;
    // echo $benz->door;
    // echo $benz->color = "red";

    // echo $benz->move();
    // echo $benz->hello(123);
    // echo $benz->changeColor('yellow');
    // echo $benz->changeColor('blue');
    // echo $benz->changeColor('crimson');
    // echo $benz->hello();
    echo Car::title('john');
    echo Car::calc(12,12);