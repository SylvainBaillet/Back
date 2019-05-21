<?php

/* Si la class B herite de A, et que la class C herite de B, alrs la class C herite de tout */
class A 
    {
        public function test1()
        {
            return "test1<hr>";
        }
    }

class B extends A 
    {
        public function test2()
        {
            return "test2<hr>";
        }
    }   

class C extends B 
    {
        public function test3()
        {
            return "test3<hr>";
        }
    }    
//-----------------------------------------
//Exo: instancier la class C et afficher les methodes issues de cette classe 

$C = new C;
echo'<pre>'; print_r(get_class_methods($C)); echo '</pre>';// get_class_methods permet d'afficher les methods issues de la class interrogée dans les ()
echo $C->test1() ."<hr>". $C->test2() ."<hr>". $C->test3();

?>    