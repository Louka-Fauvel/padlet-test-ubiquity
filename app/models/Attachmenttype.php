<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;

#[Table(name: "attachmenttype")]
class Attachmenttype{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",nullable: true,dbType: "varchar(50)")]
	#[Validator(type: "length",constraints: ["max"=>"50"])]
	private $name;

	
	#[OneToMany(mappedBy: "attachmenttype",className: "models\\Publication")]
	private $publications;


	 public function __construct(){
		$this->publications = [];
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


	public function getPublications(){
		return $this->publications;
	}


	public function setPublications($publications){
		$this->publications=$publications;
	}


	 public function addToPublications($publication){
		$this->publications[]=$publication;
		$publication->setAttachmenttype($this);
	}


	 public function __toString(){
		return $this->id.'';
	}

}