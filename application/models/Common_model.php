<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getRecords($table,$fields="",$condition="",$singleRow=false)
	{
		if ($fields != "") {
			$this->db->select($fields);
		}
		if ($condition != "") {
			$rs = $this->db->get_where($table,$condition);
		} else {
			$rs = $this->db->get($table);
		}
		if ($singleRow) {
			return $rs->row_array();
		}
		return $rs->result_array();
	}

	public function addEditRecords($tableName,$dataArray,$where="")
	{
		if ($tableName && is_array($dataArray)) {
			$columns = $this->getTableFields($tableName);
			foreach ($columns as $column_data) {
				$column_name[] = $column_data['Field'];
			}
			foreach ($dataArray as $key => $val) {
				if (in_array(trim($key),$column_name)) {
					$data[$key] = $val;
				}
			}

			if ($where == "") {
				$query = $this->db->insert_string($tableName,$data);
				$this->db->query($query);
				return $this->db->insert_id();
			} else {
				$query = $this->db->update_string($tableName,$data,$where);
				$this->db->query($query);
				return $this->db->affected_rows();
			}
		}
	}

	public function getTableFields($tableName)
	{
		$query = "SHOW COLUMNS FROM $tableName";
		$rs = $this->db->query($query);
		return $rs->result_array();
	}

	public function deleteRecords($tableName,$where)
	{
		$this->db->where($where);
		$this->db->delete($tableName);
	}


}
