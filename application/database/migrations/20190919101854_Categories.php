<?php

class Migration_Categories extends CI_Migration {

	public function up() {
		$this->myforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			)
		,
			'created_from_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'updated_from_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			)
		,
			'date_created' => array(
				'type' => 'DATETIME'
			),
			'date_updated' => array(
				'type' => 'DATETIME'
			)
		));
		$this->myforge->add_key('id', TRUE);
		$this->myforge->create_table('categories');
	}

	public function down() {
		$this->myforge->drop_table('categories');
	}

}
