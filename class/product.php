<?php
class Product {
	var $id;
	var $code;
	var $name;
	var $price;
	var $description;
	var $type;
	var $shop;
	
	function __construct($i, $c, $n, $p, $d, $t, $s) {
		$this->id = $i;
		$this->code = $c;
		$this->name = $n;
		$this->price = $p;
		$this->description= $d;
		$this->type = $t;
		$this->shop = $s;
	}
	
	function getId(){
		echo $this->id;
	}
	
	function getCode() {
		echo $this->code;
	}
	
	function getName() {
		echo $this->name;
	}
	
	function getPrice() {
		echo $this->price;
	}
	
	function getDescription() {
		echo $this->description;
	}
	
	function getType() {
		echo $this->type;
	}
	
	function getShop() {
		echo $this->shop;
	}
}

?>