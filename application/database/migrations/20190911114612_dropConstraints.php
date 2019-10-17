<?php

class Migration_dropConstraints extends CI_Migration {

    public function up() {
//        $this->dbforge->add_field(array(
//            'id' => array(
//                'type' => 'INT',
//                'constraint' => 11,
//                'auto_increment' => TRUE
//            )
//        ));
//        $this->dbforge->add_key('id', TRUE);
//        $this->dbforge->create_table('dropconstraints');
		$this->db->query(drop_foreign_key('examination_streams', 'examination_streams_ibfk_1'));
    }

    public function down() {
        //$this->dbforge->drop_table('dropconstraints');
    }

}
