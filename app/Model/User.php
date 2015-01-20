<?php 

/**
* 
*/
class User extends AppModel
{
	public $hasMany = array(
		'Travel' => array(
            'className' => 'Travel'
        )
		);

	public $validate = array(
		//pseudo
		'username' => array(
			array (
			'rule' => 'alphanumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Votre pseudo n'est pas valide"
			),
			array(
				'rule' => 'isUnique',
				 'message' => 'Ce pseudo est déjà pris',
				)
		),
		//mail
		'mail' => array(
			array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Votre email n'est pas valide"
			),
			array(
				'rule' => 'isUnique',
				 'message' => 'Cet email est déjà pris',
				)
		),
		//pass
		'password' => array(
			array(
				'rule' => 'notEmpty',
				 'message' => 'Vous devez entrer un mot de passe',
				 'allowEmpty' => false
				)
			),
		//avatar
		'avatar_file' => array(
			'rule' => array('fileExtension', array("jpg","png","jpeg")), "message" => "Vous ne pouvez uploader que des jpeg ou des png", 'allowEmpty' => true)
		);

		public function fileExtension($check,$extensions,$allowEmpty = true) {
			$file = current($check);
			if ($allowEmpty && empty($file["tmp_name"])) {
				return true;
			}
			$extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
			return in_array($extension, $extensions);
		}

		public function afterSave($created, $options = array()) {
			if (isset($this->data[$this->alias]['avatar_file'])) {
				$file = $this->data[$this->alias]['avatar_file'];
				$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
				if (!empty($file["tmp_name"])) {
					$oldextension = $this->field("avatar");
					$oldfile = IMAGES . "avatars" . DS . $this->id . "." . $oldextension;
					if (file_exists($oldfile)) {
						unlink($oldfile);
					}
					move_uploaded_file($file['tmp_name'], IMAGES . "avatars" . DS . $this->id . "." . $extension);
					$this->saveField("avatar", $extension);
				}

			}
		}
}


 ?>