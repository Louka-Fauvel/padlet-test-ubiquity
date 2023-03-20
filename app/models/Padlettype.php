<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "padlettype")]
class Padlettype{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "label",nullable: true,dbType: "varchar(100)")]
	#[Validator(type: "length",constraints: ["max"=>"100"])]
	private $label;

	
	#[OneToMany(mappedBy: "padlettype",className: "models\\Padlet")]
	private $padlets;

	
	#[ManyToMany(targetEntity: "models\\Properties",inversedBy: "padlettypes")]
	#[JoinTable(name: "padlettypeproperty",joinColumns: ["name"=>"idPadletType","referencedColumnName"=>"id"],inverseJoinColumns: ["name"=>"idProperty","referencedColumnName"=>"id"])]
	private $propertiess;


	 public function __construct(){
		$this->padlets = [];
		$this->propertiess = [];
	}


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getLabel(){
		return $this->label;
	}


	public function setLabel($label){
		$this->label=$label;
	}


	public function getPadlets(){
		return $this->padlets;
	}


	public function setPadlets($padlets){
		$this->padlets=$padlets;
	}


	 public function addToPadlets($padlet){
		$this->padlets[]=$padlet;
		$padlet->setPadlettype($this);
	}


	public function getPropertiess(){
		return $this->propertiess;
	}


	public function setPropertiess($propertiess){
		$this->propertiess=$propertiess;
	}


	 public function addPropertie($propertie){
		$this->propertiess[]=$propertie;
	}


	 public function __toString(){
		return $this->id.'';
	}

}