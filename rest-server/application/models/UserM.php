<?php

class UserM extends CI_Model
{
    public function getUser($id = null)
    {
        if ($id === null) {
            $this->db->select('user.*, receptionist.nama_receptionist');
            $this->db->from('user');
            $this->db->join('receptionist', 'user.id_receptionist = receptionist.id');
            return $this->db->get();
        } else {
            $this->db->select('user.*, receptionist.nama_receptionist');
            $this->db->from('user');
            $this->db->where(['id' => $id]);
            $this->db->join('receptionist', 'user.id_receptionist = receptionist.id');
            return $this->db->get();
        }
    }

    public function tambahUser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function editUser($where, $data)
    {
        $this->db->where($where);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function hapusUser($where)
    {
        $this->db->where($where);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }

    public function cekLogin($username, $password)
    {
        $this->db->select('user.id_receptionist, user.username, user.password, user.role_id, receptionist.nama_receptionist');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->join('receptionist', 'user.id_receptionist = receptionist.id');
        return $this->db->get();
    }
}
