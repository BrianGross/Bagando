<?php 

/**
* 
*/
class UsersController extends AppController
{
	public $recursive = 2;
	
	public function index_membre(){
		debug($this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user("id")))));
		$user_id = $this->Auth->user("id");
		if (!$user_id) {
			$this->redirect('/');
			die();
		}
		$this->set("users",$this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user("id")))));

	}


	function signup(){
		if ($this->request->is('post')) {
			//A Remettre pour la mise en ligne
			// if ($this->Recaptcha->verify()) {
			
			 $d = $this->request->data;

			
			$d['User']['id'] = null;
			if (!empty($d["User"]["password"])) {
				$d["User"]["password"] = Security::hash($d["User"]["password"],null,true);
			}
			
			if ($this->User->save($d/* [A remettre pour la mise en ligne du site] ,true,array('username','password','mail','active')*/)) {
				//A remettre pour la mise en ligne du site
				/*
				$link = array('controller' => 'users' , 'action' => 'activate',$this->User->id."=".sha1($d["User"]["password"] ));
				App::uses("CakeEmail","Network/Email");
				$mail = new CakeEmail();
				$mail->from("noreply@localhost.com")
					 ->to($d["User"]["mail"])
					 ->subject("test : Inscription")
					 ->emailFormat("html")
					 ->template("signup")
					 ->viewVars(array("username" => $d["User"]["username"], "link" => $link))
					 ->send();
				*/

				// A enlever pour la mise en ligne
				$this->User->saveField("active",1);
				$this->redirect("/users/login");
				$this->Session->setFlash("Votre compte a bien été créé","notif");
			//}
			}else {
				$this->Session->setFlash("Merci de corriger vos erreurs ou de bien vérifier le captcha","notif");
			}
		}
	}

	function login(){
		if ($this->Auth->user("id")) {
			$this->redirect("/travels/index_travels");
		}

		if ($this->request->is("post")) {
			if($this->Auth->login()) {
				$this->User->id = $this->Auth->user("id");
				if(!empty($this->request->data["User"]["cookie"])) {
				$this->Cookie->write('User.username', $this->request->data["User"]["username"], true, '1000 hour');
				$this->Cookie->write('User.password', $this->request->data["User"]["password"], true, '1000 hour');
				}
				$this->User->saveField("lastlogin",date("Y-m-d H:m:s"));
				$this->redirect("/travels/index_travel");
				$this->Session->setFlash("Vous êtes maintenant connecter","notif");
			}else {
				$this->Session->setFlash("Identifiant incorrect","notif",array('type' => 'error'));
				
			}
		}

		if ($this->Cookie->read("User.username") AND $this->Cookie->read("User.password")) {
			$this->request->data["User"]["username"] = $this->Cookie->read("User.username");
			$this->request->data["User"]["password"] = $this->Cookie->read("User.password");
			if($this->Auth->login()) {
				$this->User->id = $this->Auth->user("id");
				$this->User->saveField("lastlogin",date("Y-m-d H:m:s"));
				$this->redirect("/travels/index_travel");
				$this->Session->setFlash("Vous êtes maintenant connecter","notif");
			}else {
				$this->Session->setFlash("Identifiant incorrect","notif",array('type' => 'error'));
				
			}

		}

	}


	function logout(){

		$this->Auth->logout();
		$this->Cookie->destroy();
		$this->redirect("/");

	}

	function activate($token) {
		$token = explode('-',$token);
		$user = $this->User->find('first', array(
			'conditions' => array('id' => $token[0] , 'sha1(User.password)' => $token[1],'active' => 0)


			));
		if (!empty($user)) {
			$this->User->id = $user["User"]["id"];
			$this->User->saveField("activate",1);
			$this->Session->setFlash("Votre compte a bien été activé","notif");
			$this->Auth->login($user["User"]);
		} else {
			$this->Session->setFlash("le lien ne semble pas valide","notif",array('type' => 'error'));
		}
		$this->redirect('/');
		die();
	}

		function password() {

			if(!empty($this->request->params["name"]["token"])) {
				$token = $this->request->params["name"]["token"];
				$token = explode('-',$token);
		$user = $this->User->find('first', array('conditions' => array('id' => $token[0] , 'sha1(User.password)' => $token[1],'active' => 1)));
			if($user) {
				$this->User->id = $user["User"]["id"];
				$password = substr(sha1(uniqid(rand(),true)),0,8);
				$this->User->saveField("password",Security::hash($password, null, true));
				$this->Session->setFlash("Votre mot de passe a bien été réinitialisé, votre nouveau mot de passe est : $password","notif");
			} else {
					$this->Session->setFlash("le lien ne semble pas valide","notif",array('type' => 'error'));
			}
			
			}

			if ($this->request->is("post")) {
				$v = current($this->request->data);
				$user = $this->User->find("first",array('condition'=> array('mail'=>$v["mail"], 'active'=>1)));
				if(empty($user)) {
					$this->Session->setFlash("l'email n'existe pas","notif",array('type' => 'error'));
				}else {
					App::uses("CakeEmail","Network/Email");
					$link = array('controller' => 'users' , 'action' => 'password','token'=>$user["User"]["id"]."=".sha1($user["User"]["password"] ));
					$mail = new CakeEmail();
				$mail->from("noreply@localhost.com")
					 ->to($user["User"]["mail"])
					 ->subject("test : Mot de passe oublié")
					 ->emailFormat("html")
					 ->template("mdp")
					 ->viewVars(array("username" => $user["User"]["username"], "link" => $link))
					 ->send();
				}
			}
	}


	function edit() {

		$user_id = $this->Auth->user("id");
		if (!$user_id) {
			$this->redirect('/');
			die();
		}
		$this->User->id = $user_id;
		if ($this->request->is("put") || $this->request->is("post")) {
			$d = $this->request->data;

			$pass_error = false;
			$d["User"]["id"] = $user_id;
			if (!empty($d["User"]["pass1"])) {
				if ($d["User"]["pass1"] == $d["User"]["pass2"]) {
					$d["User"]["password"] = Security::hash($d["User"]["pass1"],null,true);
				}
				else {
					$pass_error = true;
			}
			
			} 
			if ($this->User->save($d, true, array('firstname','lastname','password'))) {
				$this->Session->setFlash("Votre compte a bien été édité","notif");
			}else{
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type' => 'error'));
			}
			if ($pass_error) {
				$this->User->validationErrors["pass2"] = array('les mots de passe ne correspondent pas');
			}
		}else {
			$this->request->data = $this->User->read();
		}
		$this->request->data["User"]["pass1"] = $this->request->data["User"]["pass2"] = "";
		$this->set("user",$this->User->findById($this->Auth->user("id")));
	}
}

 ?>