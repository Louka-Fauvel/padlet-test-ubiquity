<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;
use Ubiquity\attributes\items\OneToMany;

#[Table(name: "publication")]
class Publication{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "title",nullable: true,dbType: "varchar(100)")]
	#[Validator(type: "length",constraints: ["max"=>"100"])]
	private $title;

	
	#[Column(name: "content",nullable: true,dbType: "text")]
	private $content;

	
	#[Column(name: "mediaUrl",nullable: true,dbType: "text")]
	private $mediaUrl;

	
	#[Column(name: "color",nullable: true,dbType: "varchar(10)")]
	#[Validator(type: "length",constraints: ["max"=>"10"])]
	private $color;

	
	#[Column(name: "pPosition",nullable: true,dbType: "varchar(50)")]
	#[Validator(type: "length",constraints: ["max"=>"50"])]
	private $pPosition;

	
	#[Column(name: "pDate",nullable: true,dbType: "datetime")]
	#[Validator(type: "type",constraints: ["ref"=>"dateTime"])]
	#[Transformer(name: "datetime")]
	private $pDate;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Attachmenttype",name: "idAttachmentType",nullable: true)]
	private $attachmenttype;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Padlet",name: "idPadlet")]
	private $padlet;

	
	#[OneToMany(mappedBy: "publication",className: "models\\Comment")]
	private $comments;

	
	#[OneToMany(mappedBy: "publication",className: "models\\Pubevaluation")]
	private $pubevaluations;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\User_",name: "idCreator")]
	private $user_;


	 public function __construct(){
		$this->comments = [];
		$this->pubevaluations = [];
	}


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getTitle(){
		return $this->title;
	}


	public function setTitle($title){
		$this->title=$title;
	}


	public function getContent(){
		return $this->content;
	}


	public function setContent($content){
		$this->content=$content;
	}


	public function getMediaUrl(){
		return $this->mediaUrl;
	}


	public function setMediaUrl($mediaUrl){
		$this->mediaUrl=$mediaUrl;
	}


	public function getColor(){
		return $this->color;
	}


	public function setColor($color){
		$this->color=$color;
	}


	public function getPPosition(){
		return $this->pPosition;
	}


	public function setPPosition($pPosition){
		$this->pPosition=$pPosition;
	}


	public function getPDate(){
		return $this->pDate;
	}


	public function setPDate($pDate){
		$this->pDate=$pDate;
	}


	public function getAttachmenttype(){
		return $this->attachmenttype;
	}


	public function setAttachmenttype($attachmenttype){
		$this->attachmenttype=$attachmenttype;
	}


	public function getPadlet(){
		return $this->padlet;
	}


	public function setPadlet($padlet){
		$this->padlet=$padlet;
	}


	public function getComments(){
		return $this->comments;
	}


	public function setComments($comments){
		$this->comments=$comments;
	}


	 public function addToComments($comment){
		$this->comments[]=$comment;
		$comment->setPublication($this);
	}


	public function getPubevaluations(){
		return $this->pubevaluations;
	}


	public function setPubevaluations($pubevaluations){
		$this->pubevaluations=$pubevaluations;
	}


	 public function addToPubevaluations($pubevaluation){
		$this->pubevaluations[]=$pubevaluation;
		$pubevaluation->setPublication($this);
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