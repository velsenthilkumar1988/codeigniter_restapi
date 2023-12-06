<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeModel extends CI_Model
{
    public function get_employee()
    {
        $query = $this->db->get('employee');
        return $query->result();
    }
    public function insertEmployee($data)
    {
        return $this->db->insert('employee',$data);
    }
    public function editEmployee($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('employee');
        return $query->row();
    }
    public function update_Employee($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('employee',$data);
    }
    public function delete_Employee($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('employee');
    }
}
?>