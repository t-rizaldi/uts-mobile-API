<?php

class KamarM extends CI_Model
{

    public function getKamar($id = null)
    {
        if ($id === null) {
            $this->db->select('kamar.id, kamar.nama_kamar, jenis_kamar.jenis_kamar, jenis_kamar.fasilitas, jenis_kamar.harga');
            $this->db->from('kamar');
            $this->db->join('jenis_kamar', 'kamar.id_jenis_kamar = jenis_kamar.id');
            return $this->db->get();
        } else {
            $this->db->select('kamar.id, kamar.nama_kamar, jenis_kamar.jenis_kamar, jenis_kamar.fasilitas, jenis_kamar.harga');
            $this->db->from('kamar');
            $this->db->where(['kamar.id' => $id]);
            $this->db->join('jenis_kamar', 'kamar.id_jenis_kamar = jenis_kamar.id');
            return $this->db->get();
        }
    }


    public function getJenisKamar($id = null)
    {
        if ($id === null) {
            return $this->db->get('jenis_kamar');
        } else {
            return $this->db->get_where('jenis_kamar', ['id' => $id]);
        }
    }


    public function tambahKamar($data)
    {
        $this->db->insert('kamar', $data);
        return $this->db->affected_rows();
    }


    public function tambahJenisKamar($data)
    {
        $this->db->insert('jenis_kamar', $data);
        return $this->db->affected_rows();
    }


    public function updateKamar($where, $data)
    {
        $this->db->where($where);
        $this->db->update('kamar', $data);
        return $this->db->affected_rows();
    }


    public function updateJenisKamar($where, $data)
    {
        $this->db->where($where);
        $this->db->update('jenis_kamar', $data);
        return $this->db->affected_rows();
    }


    public function deleteKamar($where)
    {
        $this->db->delete('kamar', $where);
        return $this->db->affected_rows();
    }


    public function deleteJenisKamar($where)
    {
        $this->db->delete('jenis_kamar', $where);
        return $this->db->affected_rows();
    }
}
