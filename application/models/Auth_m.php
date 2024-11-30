<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function user_login($username, $password)
    {

        $this->db->select('u.*');
        $this->db->from('user u');
        $where = '(email = "' . $username . '")';
        // $this->db->join('mast_regional m', 'u.id_regional=m.id', 'left');

        $this->db->where($where);

        $this->db->limit(1);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user) && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
    public function save($data)
    {

        return $this->db->insert('user', $data);
    }
    public function update($data, $where)
    {
        $this->db->update('user', $data, $where);
    }

    public function update_user($data, $where1, $where2)
    {
        $this->db->update('user', $data, $where1, $where2);
    }
}
