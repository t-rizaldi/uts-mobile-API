<?php

class TransaksiM extends CI_Model
{
    public function getPesanan($id = null)
    {
        if ($id === null) {
            $this->db->select('pesanan.*, tamu.nama_tamu');
            $this->db->from('pesanan');
            $this->db->join('tamu', 'pesanan.id_tamu = tamu.id');
	    $this->db->order_by('pesanan.id', 'desc');
            return $this->db->get();
        } else {
            $this->db->select('pesanan.*, tamu.nama_tamu');
            $this->db->from('pesanan');
            $this->db->where(['id' => $id]);
            $this->db->join('tamu', 'pesanan.id_tamu = tamu.id');
	    $this->db->order_by('pesanan.id', 'desc');
            return $this->db->get();
        }
    }


    public function tambahPesanan($data)
    {
        $this->db->insert('pesanan', $data);
        return $this->db->affected_rows();
    }


    public function updatePesanan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('pesanan', $data);

        return $this->db->affected_rows();
    }


    public function deletePesanan($where)
    {
        $this->db->where($where);
        $this->db->delete('pesanan');
        return $this->db->affected_rows();
    }



    // Checkout Code
    public function getCheckout($id = null)
    {
        if ($id === null) {
	    $this->db->order_by('id', 'desc');
            return $this->db->get('checkout');
        } else {
	    $this->db->order_by('id', 'desc');
            return $this->db->get_where('checkout', ['id' => $id]);
        }
    }


    public function tambahCheckout($data)
    {
        $this->db->insert('checkout', $data);
        return $this->db->affected_rows();
    }


    public function updateCheckout($where, $data)
    {
        $this->db->where($where);
        $this->db->update('checkout', $data);

        return $this->db->affected_rows();
    }


    public function deleteCheckout($where)
    {
        $this->db->where($where);
        $this->db->delete('checkout');
        return $this->db->affected_rows();
    }



    // Checkin Code
    public function getCheckin($id = null)
    {
        if ($id === null) {
            $this->db->select('checkin.*, receptionist.nama_receptionist, kamar.nama_kamar, makanan.makanan');
            $this->db->from('checkin');
            $this->db->join('receptionist', 'checkin.id_receptionist = receptionist.id');
            $this->db->join('kamar', 'checkin.id_kamar = kamar.id');
            $this->db->join('makanan', 'checkin.id_makanan = makanan.id');
	    $this->db->order_by('checkin.id', 'desc');
            return $this->db->get();
        } else {
            $this->db->select('checkin.*, receptionist.nama_receptionist, kamar.nama_kamar, makanan.makanan');
            $this->db->from('checkin');
            $this->db->where(['id' => $id]);
            $this->db->join('receptionist', 'checkin.id_receptionist = receptionist.id');
            $this->db->join('kamar', 'checkin.id_kamar = kamar.id');
            $this->db->join('makanan', 'checkin.id_makanan = makanan.id');
	    $this->db->order_by('checkin.id', 'desc');
            return $this->db->get();
        }
    }


    public function tambahCheckin($data)
    {
        $this->db->insert('checkin', $data);
        return $this->db->affected_rows();
    }


    public function updateCheckin($where, $data)
    {
        $this->db->where($where);
        $this->db->update('checkin', $data);

        return $this->db->affected_rows();
    }


    public function deleteCheckin($where)
    {
        $this->db->where($where);
        $this->db->delete('checkin');
        return $this->db->affected_rows();
    }
}
