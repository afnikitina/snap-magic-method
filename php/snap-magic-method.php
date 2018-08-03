<?php

Class Person {
	private $personName;
	private $personAge;

	public function __construct(string $newPersonName, int $newPersonAge) {
		$this->setPersonName($newPersonName);
		$this->SetPersonAge($newPersonAge);
	}

	public function getPersonName(): string {
		return ($this->personName);

	}

	public function setPersonName(string $newPersonName) {
		$newPersonName = trim($newPersonName);

		if(empty($newPersonName) | !ctype_alpha($newPersonName)) {
			throw(new \InvalidArgumentException("Name is empty or contains characters other than letters."));
		}
		// verify that a message is shorter than 64 characters
		if(strlen($newPersonName) > 64) {
			throw(new \RangeException("Name is too long."));
		}
		// store the valid message in the class state variable
		$this->personName = $newPersonName;
	}

	public function getPersonAge(): int {
		return ($this->personAge);
	}

	public function SetPersonAge(int $newPersonAge) {
		if($newPersonAge < 0) {
			throw(new \RangeException("Person's age cannot be less than 0."));
		}

		$this->personAge = $newPersonAge;
	}

	public function greetPerson() : string {
		$age = $this->getPersonAge();
		if ($age < 18) {
			return "Hi Caleb!";
		} else if ($age > 118) {
			return "Hello captain @deepdivedylan";
		} else {
			return "Hi there!!";
		}
	}


	public function __toString() : string {
		$psersonInfo = "<table><tr><th>Name: " .$this->getPersonName()
			."</th><th>Age: " .$this->getPersonAge() ."</th></tr></table>";
		return $psersonInfo;
	}
}

// test class Person

$newPerson = new Person("James", 25);
$newPerson->greetPerson();
$newPerson->__toString();