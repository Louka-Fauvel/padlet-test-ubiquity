<?php
namespace controllers;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Route;

/**
 * Controller TestController
 */

class TestController extends \controllers\ControllerBase {

	public function index(){
	    //TODO index action implementation
		$this->loadView("TestController/index.html");
	}

	#[Get(path: "/hello/test/{message}",name: "test.hello")]
	public function hello($message) {
		$this->loadView('TestController/hello.html',compact('message'));
	}




	public function userAction() {
		$this->loadView('TestController/userAction.html');
	}

}
