<?php
// interesting problem about function overloading with signature violation
// I have tried but have not succeeded in deceiving the interpreter

// https://rmcreative.ru/blog/post/vyzvat-private-metod-klassa-v-php
// https://rmcreative.ru/blog/post/vyzvat-private-metod-klassa-v-php-bez-reflection
class MyClass
{
    public function __call($member, $arguments)
    {
        $numberOfArguments = count($arguments);

        if (method_exists($this, $function = $member.$numberOfArguments)) {
            return call_user_func_array(array($this, $function), $arguments);
        }
    }

    private function overloaded_method1($argument1)
    {
        return $argument1;
    }

    private function overloaded_method2($argument1, $argument2)
    {
        return $argument1 + $argument2;
    }
}

$class = new MyClass();

var_dump($class->overloaded_method(10));
var_dump($class->overloaded_method(10, 5));

//////////////

class BasicClass
{
    public function testMethod(string $a, int $b): string
    {
        return $this->handleArguments($a, $b);
    }

    private function handleArguments(string $a, int $b): string
    {
        return str_repeat($a, $b);
    }
}

class ChildClass extends BasicClass
{
    public function overloadedTestMethod(string $a, string $b, int $c): string
    {
        return str_repeat($a.$b, $c);
    }

    public function __call($member, $arguments)
    {
        if ($member === 'testMethod') {
            return call_user_func_array(array($this, 'overloadedTestMethod'), $arguments);
        }
    }
}

$pClass = new BasicClass();
$cClass = new ChildClass();

var_dump($pClass->testMethod('a', 10));
var_dump($cClass->testMethod('x', 'y', 5));