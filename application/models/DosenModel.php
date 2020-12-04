<?php

class DosenModel extends CI_Model
{
    public function getListDosen()
    {
        $sql = "SELECT dosen.*,prodi.nama as nama_prodi FROM dosen JOIN prodi on prodi.id_prodi = dosen.id_prodi";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertNewDosen($dosen)
    {
        $sql1 = "SELECT * FROM dosen where nidn='" . $dosen['nidn'] . "'";

        $res1 = $this->db->query($sql1);

        if (count($res1->result_array()) > 0) { //data sudah ada, berdasarkan primary key -> nidn
            return 0;
        } else {
            $sql = "INSERT INTO dosen(nidn, nama, gender, id_prodi, alamat, email) 
		        VALUES ('" . $dosen['nidn'] . "','" . $dosen['nama'] . "','" . $dosen['gender'] . "','" . $dosen['prodi'] . "','" . $dosen['alamat'] . "','" . $dosen['email'] . "')";

            if ($this->db->query($sql)) {
                return 1;
            } else {
                return -1;
            }
        }
    }

    public function updateDosen($nidn, $dosen)
    {
        $sql = "UPDATE dosen SET 
				nama = '" . $dosen['nama'] . "',
				gender = '" . $dosen['gender'] . "',
				id_prodi = '" . $dosen['prodi'] . "',
				alamat = '" . $dosen['alamat'] . "',
				email = '" . $dosen['email'] . "'

				WHERE nidn ='" . $nidn . "'
				";
        if ($this->db->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function hapusDosen($nidn)
    {
        $sql = "DELETE FROM dosen WHERE nidn='" . $nidn . "'";
        if ($this->db->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getdosenByNIDN($nidn)
    {
        $sql = "SELECT * FROM dosen WHERE nidn='" . $nidn . "'";
        $res = $this->db->query($sql);

        return $res->result_array()[0];
    }
    public function getJumlahData()
    {
        $sql = "SELECT * FROM dosen";
        $res = $this->db->query($sql);
        return count($res->result_array());
    }

    public function getListProdi()
    {
        $sql = $this->db->get('prodi');
        return $sql->result_array();
    }
}
