<?php

class Beneficios_Model extends CI_Model {

    protected $table = "in_beneficios";

    function __construct() {
        parent::__construct();
    }

    /*
     * Get rows from the cms table
     */

    function getRows($params = array()) {
        $this->db->from($this->table);
        
        
        if (array_key_exists("order", $params)) {
            foreach ($params['order'] as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        
        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by keywords
        if (!empty($params['searchKeyword'])) {
            $params['searchKeyword'] = addslashes($params['searchKeyword']);
            $this->db->where("(title LIKE '%" . $params['searchKeyword'] . "%' OR content LIKE '%" . $params['searchKeyword'] . "%')");
        }

        if (array_key_exists("id", $params)) {
            $this->db->where('id', $params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            //set start and limit
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }

            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $this->db->count_all_results();
            } elseif (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
                $this->db->limit(1);
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
            }
        }
        
        //echo $this->db->last_query();
        return $result;
    }

    public function insert($data = array()) {
        //insert cms data to cms pages table
        $insert = $this->db->insert($this->table, $data);
        //return the status
        if ($insert) {
            return $this->db->insert_id();
            ;
        } else {
            return false;
        }
    }

    /*
     * Update cms page data
     */

    public function update($data, $conditions) {
        if (!empty($data) && is_array($data) && !empty($conditions)) {
            //add modified date if not included
            if (!array_key_exists("updated_at", $data)) {
                $data['updated_at'] = date("Y-m-d H:i:s");
            }

            //update user data to users table
            $update = $this->db->update($this->table, $data, $conditions);
            return $update ? true : false;
        } else {
            return false;
        }
    }

    /*
     * Delete noticia
     */

    public function delete($id) {
        $delete = $this->db->delete($this->table, array('id' => $id));
        return $delete ? true : false;
    }

}
