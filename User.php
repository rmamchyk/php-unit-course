<?php

class User {
    public $firstName;
    public $lastName;

    public function getFullName() {
        return trim("$this->firstName $this->lastName");
    }
}
