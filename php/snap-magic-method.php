<?php

Class Person {
	private $personMessage;
	private $personAge;

	public function __construct() {

	}

	public function getPersonMessage(): string {
		return ($this->personMessage);

	}

	public function setPersonMessage(string $newPersonMessage) {
		$newPersonMessage = trim($newPersonMessage);

		if(empty($newPersonMessage) | !!ctype_alpha($newPersonMessage)) {
			throw(new \InvalidArgumentException("Message is empty or contains characters other than letters."));
		}
		// verify that a message is shorter than 64 characters
		if(strlen($newPersonMessage) > 64) {
			throw(new \RangeException("Message is too long."));
		}
		// store the valid message in the class state variable
		$this->personMessage = $newPersonMessage;
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
		$psersonInfo = "<table><tr><th>Message: " .$this->getPersonMessage()
			."</th><th>Age: " .$this->getPersonAge() ."</th></tr></table>";
		return $psersonInfo;
	}
}
