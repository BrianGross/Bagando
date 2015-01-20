<?php
App::uses('AppController', 'Controller');
/**
 * Travels Controller
 *
 * @property Travel $Travel
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TravelsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $helpers = array('Media.Media');

/**
 * index method
 *
 * @return void
 */
	
	public function resultSearch() {
		$cond = $this->Travel->find('all', array('conditions' => array('Travel.start' => $this->request->data["Travel"]["start"])));
		$this->set("request",$cond);
	}



	public function index_travel() {
		$this->set("users",$this->Travel->User->find('all', array('conditions' => array('User.id' => $this->Auth->user("id")))));
		$this->set('travels', $this->Travel->find("all"));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Travel->exists($id)) {
			throw new NotFoundException(__('Invalid travel'));
		}
		$options = array('conditions' => array('Travel.' . $this->Travel->primaryKey => $id));
		$this->set('travel', $this->Travel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set("last",$this->Travel->find("first",array("order"=>"Travel.created DESC")));
		if (!$this->Auth->user("id")) {
			$this->redirect("/");
		}
		if ($this->request->is('post')) {
			$this->Travel->create();
			if ($this->Travel->save($this->request->data)) {
				$this->Travel->saveField("user_id",$this->Auth->user("id"));
				$this->Session->setFlash(__('The travel has been saved.'));
				return $this->redirect("/users/index_membre");
			} else {
				$this->Session->setFlash(__('The travel could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Travel->exists($id)) {
			throw new NotFoundException(__('Invalid travel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Travel->save($this->request->data)) {
				$this->Session->setFlash(__('The travel has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The travel could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Travel.' . $this->Travel->primaryKey => $id));
			$this->request->data = $this->Travel->find('first', $options);
		}
		$users = $this->Travel->User->find('list');
		$this->set(compact('users'));
		debug($this->Travel->User->find('list'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Travel->id = $id;
		if (!$this->Travel->exists()) {
			throw new NotFoundException(__('Invalid travel'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Travel->delete()) {
			$this->Session->setFlash(__('The travel has been deleted.'));
		} else {
			$this->Session->setFlash(__('The travel could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index_travel'));
	}

	public function join_travel($id) {

		//Trouver le voyage correspondant à l'id passer en post
		$seek = $this->Travel->findByid($id);

		//si il n'existe pas de voyage, renvoyer l'user
		if (empty($seek)) {
			$this->redirect("/travels/index_travel");
				die();
		}
		
		//si l'utilisateur fait partie des membres du voyage, le renvoyer
		for ($i=0; $i < $seek["Travel"]["count"]; $i++) {
			$seek_in = $seek["Bagander"][$i]["user_id"];
			if ($this->Auth->user("id") == $seek_in) {
				$this->redirect("/travels/index_travel");
				die();
			}
		}

		//si l'utilisateur est le créateur du voyage, le renvoyer
		if ($this->Auth->user("id") == $seek['Travel']['user_id']) {
			$this->redirect("/travels/index_travel");
			die();
		}

		//si le voyage est plein, le renvoyer
		if ($seek["Travel"]["count"] == $seek["Travel"]["members"]) {
			$this->redirect("/travels/index_travel");
			die();
		}

		//si l'utilisateur n'a pas de photo de profil, renvoyer
		if (!$this->Auth->user("avatar")) {
			if (!$this->Travel->User->findById($this->Auth->user("id"))["User"]["avatar"]) {
			$this->redirect("/travels/index_travel");
			die();
		}
		}


		//Création des données pour pouvoir sauvegarder dans la table Bagander
		$this->request->data["Bagander"]["user_id"] = $this->Auth->user("id");
		$this->request->data["Bagander"]["travel_id"] = $id;
		$this->Travel->Bagander->create();
		if ($this->Travel->Bagander->save($this->request->data)) {
			$this->Travel->id = $id;
			$this->Travel->saveField("members",$seek["Travel"]["members"] + 1);
			$this->redirect("/travels/add");
		}
	}



	public function Page($id) {

		//Trouver le voyage correspondant à l'id passer en post
		$seek = $this->Travel->findByid($id);

		//si il n'existe pas de voyage, renvoyer l'user
		if (empty($seek)) {
			$this->redirect("/travels/index_travel");
				die();
		}

		//Envoyer les données
		$this->set("travel",$this->Travel->findByid($id));
		$this->set("posts",$this->Travel->Post->find("all",array("conditions"=>array("travel_id"=>$id),"order"=>"Post.created DESC")));
		$this->set("members",$this->Travel->Bagander->find("all",array("conditions"=>array("travel_id"=>$id))));

	}
	

	public function addpost(){
		////Trouver le voyage correspondant
		$seek = $this->Travel->findByid($this->request->data["Travel"]["id"]);

		//si l'utilisateur tape l'url sans passer par le formulaire, le renvoyer
		if (!$this->Travel->findByid($this->request->data["Travel"]["id"])) {
			$this->redirect("/travels/index_travel");
			die();
		}

		//Transformer les données de Travel à Post
		$this->request->data["Post"]["user_id"] = $this->Auth->user("id");
		$this->request->data["Post"]["travel_id"] = $this->request->data["Travel"]["id"];
		$this->request->data["Post"]["content"] = $this->request->data["Travel"]["content"];

		//Créer dans posts et rediriger vers le mur du voyage
		$this->Travel->Post->create();
		if ($this->Travel->Post->save($this->request->data)) {
			$this->redirect(
            array('controller' => 'travels', 'action' => 'page' , $this->request->data["Travel"]["id"]));
		}
	}


	public function chat($travel,$member){
		if ($this->request->is("post")) {

		$this->request->data["Chat"]["user_id"] = $this->Auth->user("id");
		$this->request->data["Chat"]["travel_id"] = $travel;
		$this->request->data["Chat"]["destinataire"] = $member;
		$this->request->data["Chat"]["content"] = $this->request->data["Travel"]["content"];
		$this->Travel->Chat->create();
		if ($this->Travel->Chat->save($this->request->data)) {
		}
		}
		$this->set("messages",$this->Travel->Chat->find("all",array('order' => 'Chat.created DESC',"conditions"=>array("OR"=>array(array("Chat.destinataire" => $member,"Chat.user_id" =>$this->Auth->user("id"),"Chat.travel_id"=>$travel),array("Chat.destinataire" => $this->Auth->user("id"),"Chat.user_id" =>$member,"Chat.travel_id"=>$travel))))));
		$this->set("url2",$member);
	}
}
