<?php
class User {
	
	var $id;
	var $firstname;
	var $insertion;
	var $lastname;
	var $email;
	var $password;
	var $phone;
	var $city;
	var $zipcode;
	var $street;
	var $housenumber;
	var $birthdate;
	var $sex;
	var $iban;
	
	function __construct( $i, $fn, $ins, $ln, $em, $p, $ph, $c, $z, $s, $hs, $bd, $sx, $ib) {
		$this->id = $i;
		$this->firstname = $fn;
		$this->insertion = $ins;
		$this->lastname = $ln;
		$this->email = $em;
		$this->password = $p;
		$this->phone = $ph;
		$this->city = $c;
		$this->zipcode = $z;
		$this->street = $s;
		$this->housenumber = $hs;
		$this->birthdate = $bd;
		$this->sex = $sx;
		$this->iban = $ib;
	}
	
	function getId(){
		echo $this->id;
	}
	function getFirstname(){
		echo $this->firstname;
	}
	function getInsertion(){
		echo $this->insertion;
	}	
	function getLastname(){
		echo $this->lastname;
	}
	function getEmail(){
		echo $this->email;
	}
	function getPassword(){
		echo $this->password;
	}
	function getPhone(){
		echo $this->phone;
	}
	function getCity(){
		echo $this->city;
	}
	function getZip(){
		echo $this->zipcode;
	}
	function getStreet(){
		echo $this->street;
	}
	function getHousenumber(){
		echo $this->housenumber;
	}
	function getBirth(){
		echo $this->birthdate;
	}
	function getSex(){
		echo $this->sex;
	}
	function getIban(){
		echo $this->iban;
	}
}
?>