<?php

class MakananM extends CI_Model
{

    public function getMakanan($id = null)
    {
        if ($id === null) {
            $this->db->select('makanan.id, makanan.makanan, makanan.harga, jenis_makanan.jenis_makanan');
            $this->db->from('makanan');
            $this->db->join('jenis_makanan', 'makanan.id_jenis_makanan = jenis_makanan.id');
            return $this->db->get();
        } else {
            $this->db->select('makanan.makanan, makanan.harga, jenis_makanan.jenis_makanan');
            $this->db->from('makanan');
            $this->db->where(['makanan.id' => $id]);
            $this->db->join('jenis_makanan', 'makanan.id_jenis_makanan = jenis_makanan.id');
            return $this->db->get();
        }
    }


    public function getJenisMakanan($id = null)
    {
        if ($id === null) {
            return $this->db->get('jenis_makanan');
        } else {
            return $this->db->get_where('jenis_makanan', ['id' => $id]);
        }
    }


    public function tambahMakanan($data)
    {
        $this->db->insert('makanan', $data);
        return $this->db->affected_rows();
    }


    public function tambahJenisMakanan($data)
    {
        $this->db->insert('jenis_makanan', $data);
        return $this->db->affected_rows();
    }


    public function updateMakanan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('makanan', $data);

        return $this->db->affected_rows();
    }


    public function updateJenisMakanan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('jenis_makanan', $data);

        return $this->db->affected_rows();
    }


    public function deleteMakanan($where)
    {
        $this->db->where($where);
        $this->db->delete('makanan');

        return $this->db->affected_rows();
    }


    public function deleteJenisMakanan($where)
    {
        $this->db->where($where);
        $this->db->delete('jenis_makanan');

        return $this->db->affected_rows();
    }
}
