<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "padletproperty")]
class Padletproperty{
	
	#[Id()]
	#[Column(name: "idPadlet",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $idPadlet;

	
	#[Id()]
	#[Column(name: "idProperty",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $idProperty;

	
	#[Column(name: "pValue",nullable: true,dbType: "varchar(100)")]
	#[Validator(type: "length",constraints: ["max"=>"100"])]
	private $pValue;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Padlet",name: "idPadlet")]
	private $padlet;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Properties",name: "idProperty")]
	private $properties;


	public function getIdPadlet(){
		return $this->idPadlet;
	}


	public function setIdPadlet($idPadlet){
		$this->idPadlet=$idPadlet;
	}


	public function getIdProperty(){
		return $this->idProperty;
	}


	public function setIdProperty($idProperty){
		$this->idProperty=$idProperty;
	}


	public function getPValue(){
		return $this->pValue;
	}


	public function setPValue($pValue){
		$this->pValue=$pValue;
	}


	public function getPadlet(){
		return $this->padlet;
	}


	public function setPadlet($padlet){
		$this->padlet=$padlet;
	}


	public function getProperties(){
		return $this->properties;
	}


	public function setProperties($properties){
		$this->properties=$properties;
	}


	 public function __toString(){
		return $this->idPadlet.'';
	}

}