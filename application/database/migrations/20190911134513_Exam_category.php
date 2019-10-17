<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Exam_category extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => TRUE
            ),
			'category_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			)
        ));
        $this->dbforge->add_key('category_id', TRUE);
        $this->dbforge->create_table('exam_category', TRUE, getDbAttributes());
    }

    public function down() {
        $this->dbforge->drop_table('exam_category');
    }

}
