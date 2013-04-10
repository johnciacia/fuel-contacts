<?php

namespace Contacts;

use Orm\Model;

class Model_Person extends Model
{
	protected static $_properties = array(
		'id',
		'first',
		'last',
		'email',
		'created_at',
		'updated_at',
	);

	protected static $_many_many = array('groups');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = \Validation::forge($factory);
		$val->add_field('first', 'First', 'required|max_length[255]');
		$val->add_field('last', 'Last', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');

		return $val;
	}

}
