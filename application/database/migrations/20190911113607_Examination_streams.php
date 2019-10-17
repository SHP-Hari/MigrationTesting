<?php

class Migration_Examination_streams extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'stream_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => TRUE
            ),
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 10
			),
			'stream_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			)
        ));
        $this->dbforge->add_key('stream_id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (category_id) REFERENCES examination_category(category_id)');
        $this->dbforge->create_table('examination_streams');
    }

    public function down() {
        $this->dbforge->drop_table('examination_streams');
    }

}
