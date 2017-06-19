<?php
class Shop {
	var $id;
	var $name;
	var $zip;
	var $street;
	var $housenumber;
	
	function __construct($i, $n, $z, $s, $h) {
		$this->id = $i;
		$this->name = $n;
		$this->zip = $z;
		$this->street = $s;
		$this->housenumber= $h;
	}
	
	function getId(){
		echo $this->id;
	}
	
	function getName() {
		echo $this->name;
	}
	
	function getZip() {
		echo $this->zip;
	}
	
	function getStreet() {
		echo $this->street;
	}
	
	function getHousenumber() {
		echo $this->housenumber;
	}
}

?>