<?php
App::uses('AppModel', 'Model');
/**
 * Travel Model
 *
 * @property User $User
 */
class Travel extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */

	public $actsAs = array('Media.Media' => array(
	'path' => 'img/Uploads/travels/%f'));
	public $recursive = 2;
	public $validate = array(
		'categorie' => array(
			'rule' => 'alphanumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Veuillez entrer une catégorie"
			),
		'defi1' => array(
			'rule' => 'alphanumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Veuillez entrer un défi"
			),
		'defi2' => array(
			'rule' => 'alphanumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Veuillez entrer un défi"
			),
		'defi3' => array(
			'rule' => 'alphanumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Veuillez entrer un défi"
			),
		'avatar_file' => array(
			'rule' => array('fileExtension', array("jpg","png","jpeg")), "message" => "Vous ne pouvez uploader que des jpeg ou des png")
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Bagander' => array(
            'className' => 'Bagander'
        ),
        'Post' => array(
            'className' => 'Post'
        ),
        'Chat' => array(
            'className' => 'Chat'
        )
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
					$oldfile = IMAGES . "avatars_travel" . DS . $this->id . "." . $oldextension;
					if (file_exists($oldfile)) {
						unlink($oldfile);
					}
					move_uploaded_file($file['tmp_name'], IMAGES . "avatars_travel" . DS . $this->id . "." . $extension);
					$this->saveField("avatar", $extension);
				}

			}
}
}