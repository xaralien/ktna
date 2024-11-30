<?php defined('BASEPATH') or exit('No direct script access allowed');

class Latest_News_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    function item_get($limit, $start, $search)
    {
        if ($search) {
            // $sql = "SELECT * FROM item_list WHERE nama LIKE '%$search%' OR nomor LIKE '%$search%' ORDER BY Id DESC limit " . $start . ", " . $limit;
            $sql = "SELECT * FROM artikel WHERE artikel.title LIKE '%$search%' OR artikel.category LIKE '%$search%' ORDER BY Id DESC limit " . $start . ", " . $limit;
        } else {
            $sql = "SELECT * FROM artikel ORDER BY Id DESC limit " . $start . ", " . $limit;
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    function item_count($search)
    {
        if ($search) {
            $sql = "SELECT * FROM artikel WHERE title LIKE '%$search%' OR category LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM artikel";
        }
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
