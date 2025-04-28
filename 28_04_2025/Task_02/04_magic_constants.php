<?php
    echo __LINE__;
    echo "<br>";
    echo __FILE__;
    echo "<br>";

    echo __DIR__ . "<br><br>";    

    echo dirname(__FILE__) . "<br><br>";      

    function test(){      
        echo 'The function name is '. __FUNCTION__ . "<br><br>";     
    }      
    test();      
    function test_function(){      
        echo 'Hi';      
    }      
    test_function();      
    echo  __FUNCTION__ . "<br><br>"; /// blank 



    class TestClass {      
        public function testMethod() {      
            echo 'The class name is ' . __CLASS__ . "<br><br>";      
        }      
    }
    $obj = new TestClass();
    $obj->testMethod();

    class TestClass2 extends TestClass {      
        public function testMethod2() {      
            echo 'The class name is ' . __CLASS__ . "<br><br>";      
        }      
    }
    $obj2 = new TestClass2();
    $obj2->testMethod2();

    echo __TRAIT__ . "<br><br>"; /// blank  

    
?>