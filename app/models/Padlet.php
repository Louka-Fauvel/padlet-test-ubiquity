<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "padlet")]
class Padlet{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",nullable: true,dbType: "varchar(70)")]
	#[Validator(type: "length",constraints: ["max"=>"70"])]
	private $name;

	
	#[Column(name: "description",nullable: true,dbType: "text")]
	private $description;

	
	#[OneToMany(mappedBy: "padlet",className: "models\\Padletproperty")]
	private $padletpropertys;

	
	#[OneToMany(mappedBy: "padlet",className: "models\\Publication")]
	private $publications;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Padlettype",name: "idPadletType")]
	private $padlettype;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Team",name: "idTeam",nullable: true)]
	private $team;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\User_",name: "idCreator")]
	private $user_;


	 public function __construct(){
		$this->padletpropertys = [];
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
		$padletproperty->setPadlet($this);
	}


	public function getPublications(){
		return $this->publications;
	}


	public function setPublications($publications){
		$this->publications=$publications;
	}


	 public function addToPublications($publication){
		$this->publications[]=$publication;
		$publication->setPadlet($this);
	}


	public function getPadlettype(){
		return $this->padlettype;
	}


	public function setPadlettype($padlettype){
		$this->padlettype=$padlettype;
	}


	public function getTeam(){
		return $this->team;
	}


	public function setTeam($team){
		$this->team=$team;
	}


	public function getUser_(){
		return $this->user_;
	}


	public function setUser_($user_){
		$this->user_=$user_;
	}


	 public function __toString(){
		return $this->id.'';
	}

}