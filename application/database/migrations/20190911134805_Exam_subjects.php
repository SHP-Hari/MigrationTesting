<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Exam_subjects extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'subject_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => TRUE
            ),
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 10,
			),
			'subject_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			)
        ));
        $this->dbforge->add_key('subject_id', TRUE);
        $this->dbforge->create_table('exam_subjects', TRUE, getDbAttributes());
		$this->db->query(addForeignKey('exam_subjects', 'category_id', 'exam_category(category_id)'));
    }

    public function down() {
        $this->dbforge->drop_table('exam_subjects');
    }

}
