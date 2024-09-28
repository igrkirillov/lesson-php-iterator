<?php

namespace Model;

class Person
{
    private string $name;
    private int $age;
    private int $height;

    public function __construct(string $name, int $age, int $height)
    {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->age . ($this->height ?? "");
    }

    public function __get($name)
    {
        fwrite(STDOUT, "Попытка обратиться к несуществующему свойству " . $name . PHP_EOL);
    }

    public function __set($name, $value)
    {
        fwrite(STDOUT, "Попытка засетить несуществующее свойство " . $name . PHP_EOL);
    }

    public function __sleep()
    {
        fwrite(STDOUT, "Вызвана сериализация объекта " . PHP_EOL);
        return array("name", "age");
    }

    public function __wakeup()
    {
        fwrite(STDOUT, "Вызвана десериализация объекта " . PHP_EOL);
    }
}