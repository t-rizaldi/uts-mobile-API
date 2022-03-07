<?php

class PeopleM extends CI_Model
{
    public function getRecep($id = null)
    {
        if ($id === null) {
            return $this->db->get('receptionist');
        } else {
            return $this->db->get_where('receptionist', ['id' => $id]);
        }
    }


    public function getTamu($id = null)
    {
        if ($id === null) {
            return $this->db->get('tamu');
        } else {
            return $this->db->get_where('tamu', ['id' => $id]);
        }
    }


    public function tambahRecep($data)
    {
        $this->db->insert('receptionist', $data);
        return $this->db->affected_rows();
    }


    public function tambahTamu($data)
    {
        $this->db->insert('tamu', $data);
        return $this->db->affected_rows();
    }


    public function updateRecep($where, $data)
    {
        $this->db->where($where);
        $this->db->update('receptionist', $data);

        return $this->db->affected_rows();
    }


    public function updateTamu($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tamu', $data);

        return $this->db->affected_rows();
    }


    public function deleteRecep($where)
    {
        $this->db->where($where);
        $this->db->delete('receptionist');

        return $this->db->affected_rows();
    }


    public function deleteTamu($where)
    {
        $this->db->where($where);
        $this->db->delete('tamu');

        return $this->db->affected_rows();
    }
}
