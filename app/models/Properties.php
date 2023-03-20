<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "properties")]
class Properties{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",nullable: true,dbType: "varchar(50)")]
	#[Validator(type: "length",constraints: ["max"=>"50"])]
	private $name;

	
	#[Column(name: "pType",nullable: true,dbType: "varchar(50)")]
	#[Validator(type: "length",constraints: ["max"=>"50"])]
	private $pType;

	
	#[Column(name: "description",nullable: true,dbType: "text")]
	private $description;

	
	#[OneToMany(mappedBy: "properties",className: "models\\Padletproperty")]
	private $padletpropertys;

	
	#[ManyToMany(targetEntity: "models\\Padlettype",inversedBy: "propertiess")]
	#[JoinTable(name: "padlettypeproperty",joinColumns: ["name"=>"idProperty","referencedColumnName"=>"id"],inverseJoinColumns: ["name"=>"idPadletType","referencedColumnName"=>"id"])]
	private $padlettypes;


	 public function __construct(){
		$this->padletpropertys = [];
		$this->padlettypes = [];
	}


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getName(){
		return $this->name;
	}


	public function setName($name){
		$this->name=$name;
	}


	public function getPType(){
		return $this->pType;
	}


	public function setPType($pType){
		$this->pType=$pType;
	}


	public function getDescription(){
		return $this->description;
	}


	public function setDescription($description){
		$this->description=$description;
	}


	public function getPadletpropertys(){
		return $this->padletpropertys;
	}


	public function setPadletpropertys($padletpropertys){
		$this->padletpropertys=$padletpropertys;
	}


	 public function addToPadletpropertys($padletproperty){
		$this->padletpropertys[]=$padletproperty;
		$padletproperty->setProperties($this);
	}


	public function getPadlettypes(){
		return $this->padlettypes;
	}


	public function setPadlettypes($padlettypes){
		$this->padlettypes=$padlettypes;
	}


	 public function addPadlettype($padlettype){
		$this->padlettypes[]=$padlettype;
	}


	 public function __toString(){
		return $this->id.'';
	}

}