<?php

//a class is a blue print for an object
class Conversation
{
    // Property to hold name
    public $name = '';

    // Method to say hello to name
    function sayHello()
    {
        return "Hello {$this->name}";
    }
}

// build house to create an instance
$talk = new Conversation();
$talk->name = 'Chris';
echo $talk->sayHello();