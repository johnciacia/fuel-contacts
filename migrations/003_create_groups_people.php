<?php

namespace Fuel\Migrations;

class Create_groups_people
{
	public function up()
	{
		\DBUtil::create_table('groups_people', array(
			'group_id' => array('constraint' => 11, 'type' => 'int'),
			'person_id' => array('constraint' => 11, 'type' => 'int'),
		), array('group_id', 'person_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('groups_people');
	}
}