<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * @author Great Hari <hari@extrogene.com>
 * @copyright (c) Extrogene Software
 * Date: 17-Oct-19
 * Time: 1:59 PM
 */

class DataModel extends CI_Model {

	function getLettersAssignment(){
		$this->db->select("*");
		$this->db->from('assignment_letters');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
	}
}
