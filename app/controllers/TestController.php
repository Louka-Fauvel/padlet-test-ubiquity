<?php
namespace controllers;
use models\User_;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\orm\DAO;
use Ubiquity\security\data\EncryptionManager;
use Ubiquity\utils\http\URequest;

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

    #[Get(path: "/encTest", name: "test.encTest")]
    public function encTestAction() {
        $user = DAO::getById(User_::class, 1);
        $encryptedUser = EncryptionManager::encrypt($user);
        $this->loadDefaultView(compact('user', 'encryptedUser'));
    }

    #[Post(path: "/decTest", name: "test.decTest")]
    public function decTestAction() {
        $user = URequest::post('user');
        $decryptedUser = EncryptionManager::decrypt($user);
        $this->loadDefaultView(compact('user', 'decryptedUser'));
    }

}
