<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "pubevaluation")]
class Pubevaluation{
	
	#[Id()]
	#[Column(name: "idUser",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $idUser;

	
	#[Id()]
	#[Column(name: "idPublication",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $idPublication;

	
	#[Column(name: "note",nullable: true,dbType: "tinyint(4)")]
	private $note;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Publication",name: "idPublication")]
	private $publication;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\User_",name: "idUser")]
	private $user_;


	public function getIdUser(){
		return $this->idUser;
	}


	public function setIdUser($idUser){
		$this->idUser=$idUser;
	}


	public function getIdPublication(){
		return $this->idPublication;
	}


	public function setIdPublication($idPublication){
		$this->idPublication=$idPublication;
	}


	public function getNote(){
		return $this->note;
	}


	public function setNote($note){
		$this->note=$note;
	}


	public function getPublication(){
		return $this->publication;
	}


	public function setPublication($publication){
		$this->publication=$publication;
	}


	public function getUser_(){
		return $this->user_;
	}


	public function setUser_($user_){
		$this->user_=$user_;
	}


	 public function __toString(){
		return $this->idUser.'';
	}

}