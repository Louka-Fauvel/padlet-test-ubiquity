<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "user_")]
class User_{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "login",dbType: "varchar(255)")]
	#[Validator(type: "length",constraints: ["max"=>"255","notNull"=>true])]
    #[Transformer(name: "crypt")]
	private $login;

	
	#[Column(name: "password",nullable: true,dbType: "varchar(255)")]
	#[Validator(type: "length",constraints: ["max"=>"255"])]
	#[Transformer(name: "hpassword")]
	private $password;

	
	#[Column(name: "email",nullable: true,dbType: "varchar(255)")]
	#[Validator(type: "email",constraints: [])]
	#[Validator(type: "length",constraints: ["max"=>"255"])]
	private $email;

	
	#[OneToMany(mappedBy: "user_",className: "models\\Comment")]
	private $comments;

	
	#[OneToMany(mappedBy: "user_",className: "models\\Padlet")]
	private $padlets;

	
	#[OneToMany(mappedBy: "user_",className: "models\\Pubevaluation")]
	private $pubevaluations;

	
	#[OneToMany(mappedBy: "user_",className: "models\\Publication")]
	private $publications;

	
	#[OneToMany(mappedBy: "user_",className: "models\\Team")]
	private $teams;

	
	#[ManyToMany(targetEntity: "models\\Team",inversedBy: "user_s")]
	#[JoinTable(name: "teammember",joinColumns: ["name"=>"idUser","referencedColumnName"=>"id"])]
	private $teammembers;


	 public function __construct(){
		$this->comments = [];
		$this->padlets = [];
		$this->pubevaluations = [];
		$this->publications = [];
		$this->teams = [];
		$this->teammembers = [];
	}


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getLogin(){
		return $this->login;
	}


	public function setLogin($login){
		$this->login=$login;
	}


	public function getPassword(){
		return $this->password;
	}


	public function setPassword($password){
		$this->password=$password;
	}


	public function getEmail(){
		return $this->email;
	}


	public function setEmail($email){
		$this->email=$email;
	}


	public function getComments(){
		return $this->comments;
	}


	public function setComments($comments){
		$this->comments=$comments;
	}


	 public function addToComments($comment){
		$this->comments[]=$comment;
		$comment->setUser_($this);
	}


	public function getPadlets(){
		return $this->padlets;
	}


	public function setPadlets($padlets){
		$this->padlets=$padlets;
	}


	 public function addToPadlets($padlet){
		$this->padlets[]=$padlet;
		$padlet->setUser_($this);
	}


	public function getPubevaluations(){
		return $this->pubevaluations;
	}


	public function setPubevaluations($pubevaluations){
		$this->pubevaluations=$pubevaluations;
	}


	 public function addToPubevaluations($pubevaluation){
		$this->pubevaluations[]=$pubevaluation;
		$pubevaluation->setUser_($this);
	}


	public function getPublications(){
		return $this->publications;
	}


	public function setPublications($publications){
		$this->publications=$publications;
	}


	 public function addToPublications($publication){
		$this->publications[]=$publication;
		$publication->setUser_($this);
	}


	public function getTeams(){
		return $this->teams;
	}


	public function setTeams($teams){
		$this->teams=$teams;
	}


	 public function addToTeams($team){
		$this->teams[]=$team;
		$team->setUser_($this);
	}


	public function getTeammembers(){
		return $this->teammembers;
	}


	public function setTeammembers($teammembers){
		$this->teammembers=$teammembers;
	}


	 public function addTeammember($teammember){
		$this->teammembers[]=$teammember;
	}


	 public function __toString(){
		return ($this->login??'no value').'';
	}

}