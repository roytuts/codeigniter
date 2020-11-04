<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
* Description of backup_model
*
* @author http://www.roytuts.com
*/
class Backup_model extends CI_Model {

	private $backup = 'backup';

	/**
	* save backup details
	*
	* @return boolean
	*/
	function save_backup_details($file_name, $file_path) {
		$this->db->trans_start();
		$data = array(
			'backup_name' => $file_name,
			'backup_location' => $file_path,
			'created_date' => date('Y-m-d H:i:s')
		);
		
		$this->db->insert($this->backup, $data);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return NULL;
		} else {
			$this->db->trans_commit();
			return $id;
		}
		return NULL;
	}

	/**
	* delete db backup file
	*
	* @return boolean
	*/
	function delete_db_file($file_id) {
		$this->db->trans_start();
		$this->db->where('backup_id', $file_id);
		$query = $this->db->get($this->backup);
		$temp = $query->row();
		$this->db->where('backup_id', $file_id);
		$this->db->delete($this->backup);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return NULL;
		} else {
			$this->db->trans_commit();
			return $temp;
		}
	}

	/**
	* check file exists in db
	*
	* @return boolean
	*/
	function check_db_file($file_id) {
		$this->db->where('backup_id', $file_id);
		$this->db->limit(1);
		$query = $this->db->get($this->backup);
		
		if ($query->num_rows() == 1) {
			return $query->row();
		}
		return NULL;
	}

	/**
	* check file exists in db
	*
	* @return boolean
	*/
	function check_site_file($file_id) {
		$this->db->where('backup_id', $file_id);
		$this->db->limit(1);
		$query = $this->db->get($this->backup);
		
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return NULL;
		}
	}

	/**
	* delete site backup file
	*
	* @return boolean
	*/
	function delete_site_file($file_id) {
		$this->db->trans_start();
		$this->db->where('backup_id', $file_id);
		$query = $this->db->get($this->backup);
		$temp = $query->row();
		$this->db->where('backup_id', $file_id);
		$this->db->delete($this->backup);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return NULL;
		} else {
			$this->db->trans_commit();
			return $temp;
		}
	}

}

/* End of file backup_model.php */
/* Location: ./application/models/Backup_Model.php */