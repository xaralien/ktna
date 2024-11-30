<?php defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_Management_m extends CI_Model
{
    var $table = 'artikel';
    var $column_order = array('Id', 'category', 'title', 'thumbnail', 'tanggal', 'count'); //set column field database for datatable orderable
    var $column_search = array('Id', 'category', 'title', 'thumbnail', 'tanggal', 'count'); //set column field database for datatable searchable 
    var $order = array('artikel.tanggal' => 'DESC'); // default order 

    function _get_datatables_query()
    {

        $this->db->select('artikel.*');
        $this->db->from('artikel');
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {

        $this->_get_datatables_query();
        $query = $this->db->get();

        return $this->db->count_all_results();
    }

    public function save_file($data)
    {
        $this->db->insert('artikel', $data);
        return $this->db->insert_id();
    }

    public function get_id_edit($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('Id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update_file($data, $where)
    {
        $this->db->update('artikel', $data, $where);
    }

    public function delete($where)
    {
        $this->db->delete($this->table, $where);
    }
    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('category');
        // $this->db->where('posisi', 'Pengurus');
        return $this->db->get()->result();
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        return $this->db->get()->result();
    }
    public function artikel_trending_text_1()
    {
        $this->db->select('title');
        $this->db->from('artikel');

        // Filter for articles within the last 7 days
        $this->db->where('tanggal >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->where('tanggal <=', date('Y-m-d')); // Optional: up to today's date

        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
    public function artikel_trending_text_2()
    {
        $this->db->select('title');
        $this->db->from('artikel');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
    public function artikel_trending_now_1()
    {
        $this->db->select('*');
        $this->db->from('artikel');


        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function artikel_trending_now_2()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function artikel_sub_trending_1()
    {
        $trending = $this->artikel_trending_now_1();

        // Get trending article 2 only if trending article 1 is empty
        if (empty($trending)) {
            $trending = $this->artikel_trending_now_2(); // Use trending 2 as fallback
        }

        // Get trending article 2 (for sub-trending), ensuring it does not include trending_1
        $this->db->select('*');
        $this->db->from('artikel');

        // Exclude the article used for trending (either trending_1 or trending_2)
        $this->db->where_not_in('Id', [$trending->Id]);

        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }

    public function artikel_sub_trending_2()
    {
        // Get trending article 1
        $trending_1 = $this->artikel_trending_now_1();

        // Use trending 2 as fallback if trending 1 is empty
        if (empty($trending_1)) {
            $trending_1 = $this->artikel_trending_now_2();
        }

        // Get sub-trending article 1
        $sub_trending_1 = $this->artikel_sub_trending_1();

        // Initialize the exclude_ids array
        $exclude_ids = [];

        // Add the ID of trending 1 if available
        if (!empty($trending_1) && isset($trending_1->Id)) {
            $exclude_ids[] = $trending_1->Id;
        }

        // Add the ID of sub-trending 1 if available
        if (!empty($sub_trending_1) && isset($sub_trending_1[0]->Id)) {
            $exclude_ids[] = $sub_trending_1[0]->Id;
        }

        // Fetch sub-trending articles while excluding specified IDs
        $this->db->select('*');
        $this->db->from('artikel');

        // Exclude the IDs only if exclude_ids is not empty
        if (!empty($exclude_ids)) {
            $this->db->where_not_in('Id', $exclude_ids);
        }

        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();

        return $query->result();
    }

    public function artikel_weekly_topnews()
    {
        // Get trending article 1
        $trending_1 = $this->artikel_trending_now_1();

        // Get trending article 2 only if trending article 1 is empty
        if (empty($trending_1)) {
            $trending_1 = $this->artikel_trending_now_2(); // Use trending 2 as fallback
        }

        // Get sub-trending article 1
        $sub_trending_1 = $this->artikel_sub_trending_1();

        // Get sub-trending article 2
        $sub_trending_2 = $this->artikel_sub_trending_2();

        // Initialize the exclude_ids array
        $exclude_ids = [];

        // Add trending_1 ID if it exists
        if ($trending_1) {
            $exclude_ids[] = $trending_1->Id;
        }

        // Add sub_trending_1 ID if it exists
        if (!empty($sub_trending_1)) {
            $exclude_ids[] = $sub_trending_1[0]->Id; // Assuming it's an array and you want the first element
        }

        // Add sub_trending_2 ID if it exists
        if (!empty($sub_trending_2)) {
            $exclude_ids[] = $sub_trending_2[0]->Id; // Assuming it's an array and you want the first element
        }

        // Get weekly top news, ensuring it does not include trending_1, trending_2, sub_trending_1, or sub_trending_2
        $this->db->select('*');
        $this->db->from('artikel');

        // Exclude the articles that are part of trending_1, trending_2, sub_trending_1, and sub_trending_2
        if (!empty($exclude_ids)) {
            $this->db->where_not_in('Id', $exclude_ids);
        }

        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
    public function artikel_latest()
    {
        // Get trending article 1
        $trending_1 = $this->artikel_trending_now_1();

        // Get trending article 2 only if trending article 1 is empty
        if (empty($trending_1)) {
            $trending_1 = $this->artikel_trending_now_2(); // Use trending 2 as fallback
        }

        // Get sub-trending article 1
        $sub_trending_1 = $this->artikel_sub_trending_1();

        // Get sub-trending article 2
        $sub_trending_2 = $this->artikel_sub_trending_2();

        $weekly_top = $this->artikel_weekly_topnews();

        // Initialize the exclude_ids array
        $exclude_ids = [];

        // Add trending_1 ID if it exists
        if ($trending_1) {
            $exclude_ids[] = $trending_1->Id;
        }

        // Add sub_trending_1 ID if it exists
        if (!empty($sub_trending_1)) {
            $exclude_ids[] = $sub_trending_1[0]->Id; // Assuming it's an array and you want the first element
        }

        // Add sub_trending_2 ID if it exists
        if (!empty($sub_trending_2)) {
            $exclude_ids[] = $sub_trending_2[0]->Id; // Assuming it's an array and you want the first element
        }

        if (!empty($weekly_top)) {
            $exclude_ids[] = $weekly_top[0]->Id; // Assuming it's an array and you want the first element
        }



        // Get weekly top news, ensuring it does not include trending_1, trending_2, sub_trending_1, or sub_trending_2
        $this->db->select('*');
        $this->db->from('artikel');

        // Exclude the articles that are part of trending_1, trending_2, sub_trending_1, and sub_trending_2
        // if (!empty($exclude_ids)) {
        //     $this->db->where_not_in('Id', $exclude_ids);
        // }
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }
    public function artikel_recent()
    {

        // Get weekly top news, ensuring it does not include trending_1, trending_2, sub_trending_1, or sub_trending_2
        $this->db->select('*');
        $this->db->from('artikel');

        // Exclude the articles that are part of trending_1, trending_2, sub_trending_1, and sub_trending_2
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_count($id)
    {
        $this->db->set('view_count', 'view_count + 1', FALSE); // FALSE prevents escaping of the expression
        $this->db->where('Id', $id);
        $this->db->update('artikel'); // Replace 'your_table_name' with your actual table name
    }
}
