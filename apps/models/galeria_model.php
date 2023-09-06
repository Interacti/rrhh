<?php

class Galeria_Model extends CI_Model {

    protected $table = "in_galeria";
    protected $tableImage ='in_imagen_galeria';
    function __construct() {
        parent::__construct();
    }

    /*
     * Get rows from the cms table
     */

    function getRows($params = array()) {
        
        $this->db->from($this->table);
        $this->db->order_by('created_at', 'desc');
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

        //return fetched data
        //
        //
        return $result;
    }
    
    
    public function insertImage($data = array()) {
        $insert = $this->db->insert($this->tableImage, $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
     public function  updateImage($data = array()) {
         $this->db->where('id', $data['id']);
         $this->db->update($this->tableImage, $data);
         return TRUE;
    }
       
    
   
    
    public function listImage($id) {
        $query = $this->db->where('id_galery',$id)->get( $this->tableImage );
        return $query->result (); 
     }
     
      public function getImageEdit($id) {
        $query = $this->db->where('id',$id)->get( $this->tableImage );
        return $query->result ();
     }
     

    public function insert($data = array()) {
        $insert = $this->db->insert($this->table, $data);
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
        $delete = $this->db->delete($this->cmsTbl, array('id' => $id));
        return $delete ? true : false;
    }
    
    public function getImagesByGaleryId($galery_id){
        $this->db->select('*')->from($this->tableImage)->where('id_galery',$galery_id)->where('status',1);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    

}
