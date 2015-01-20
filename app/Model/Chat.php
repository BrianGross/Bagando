<?php
App::uses('AppModel', 'Model');
/**
 * Travel Model
 *
 * @property User $User
 */
class Chat extends AppModel {

	public $belongsTo = array(
		'Travel' => array(
			'className' => 'Travel',
			'foreignKey' => 'travel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}