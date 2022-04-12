<?php

class Apple {

    private ?int $someInt;

    public function __construct(int $someInt = null)
    {
        $this->someInt = $someInt;
        echo("Hello from Apple (class)\n");
    }

}

#[Attribute]
class Banana {

    private ?Apple $apple;

    public function __construct(?Apple $apple = null)
    {
        $this->apple = $apple;
        echo("Hello from Banana (attribute)\n");
    }

}

// PhpStorm shows "Constant expression contains invalid operations"
// the error message is wrong, the code is correct and working.
// link to RFC which provided the new functionality: https://wiki.php.net/rfc/new_in_initializers#nested_attributes
// Bug is here: |
//              |
//             \|/
#[Banana(apple: new Apple(10))]
class Cherry {

    public function __construct(){
        echo("Hello from Cherry\n");
    }

}

echo(sprintf("PHP version: %s\n", phpversion()));

$cherry = new Cherry();

$reflectionClass = new ReflectionClass($cherry);
$attribute = $reflectionClass->getAttributes()[0]->newInstance();
print_r($attribute);

// result:
//
// PHP version: 8.1.2
// Hello from Cherry
// Hello from Apple (class)
// Hello from Banana (attribute)
// Banana Object
// (
//     [apple:Banana:private] => Apple Object
//         (
//             [someInt:Apple:private] => 10
//         )
//
// )
