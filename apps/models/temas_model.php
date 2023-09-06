<?php
class Temas_Model extends CI_Model {
	protected $table = "in_temas";
	function __construct() {
		parent::__construct ();
	}
	
	function ListarTemas() {
	
			$this->db->select('
				in_temas.id,
				in_temas.titulo,
				in_sub_categoria_temas.glosa_sub_categoria,
				in_categoria_temas.glosa_categoria,
				in_temas.fecha,
				in_temas.feacha_act,
				in_temas.estado
			')
			->from('in_temas')
			->join('in_sub_categoria_temas','in_temas.categoria= in_sub_categoria_temas.id_sub_categoria')
			->join('in_categoria_temas','in_sub_categoria_temas.id_categoria = in_categoria_temas.id_categoria')
			->order_by('fecha','desc');
       		$query = $this->db->get();
            //echo $this->db->last_query();
	   		return $query->result();


		$query = $this->db->get ( $this->table );
		return $query->result ();
	}
    
    function getTemas() {
            $this->db->select('*')
		    ->from($this->table)
            ->where('estado',"1")
            ->order_by('id','desc')
            ->limit(3);
            $query = $this->db->get();
       		return $query->result();
	}
	
    /*function getRows($params = array())
    {
        $this->db->select("
            in_socio.rutdv,
            in_socio.nombre_full,
            in_cargo.glosa cargo, 
            in_centro_costo.glosa cc,
            in_departamentos.glosa depto,
            in_socio.telefono_socio,
            in_socio.celular_socio,
            in_socio.anexo,
            in_socio.email
        ")
        ->from('in_socio')
        ->join('in_cargo','in_socio.id_cargo = in_cargo.id')
        ->join('in_centro_costo','in_socio.id_centro_costo = in_centro_costo.id')
        ->join('in_departamentos','in_socio.id_departamento = in_departamentos.id')
        ->where('in_socio.id_departamento',$this->input->post('area'))
        ->order_by('apellido','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }*/
    
    function getRows($params = array()){
        $this->db->select("
            in_socio.rutdv,
            in_socio.nombre_full,
            in_cargo.glosa cargo, 
            in_centro_costo.glosa cc,
            in_departamentos.glosa depto,
            in_socio.telefono_socio,
            in_socio.celular_socio,
            in_socio.anexo,
            in_socio.email
        ")
        ->from('in_socio')
        ->join('in_cargo','in_socio.id_cargo = in_cargo.id')
        ->join('in_centro_costo','in_socio.id_centro_costo = in_centro_costo.id')
        ->join('in_departamentos','in_socio.id_departamento = in_departamentos.id')
        ->where('in_socio.id_departamento',$this->input->post('area'))
        ->order_by('apellido','desc');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('title',$params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('title',$params['search']['sortBy']);
        }else{
            $this->db->order_by('id','desc');
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }


	
	
	function getInfo($categoria,$subcategoria){
			$this->db->select('
				in_sub_categoria_temas.glosa_sub_categoria,
				in_sub_categoria_temas.seo_sub_categoria,
				in_categoria_temas.glosa_categoria,
				in_temas.titulo,
				in_temas.seo,
				in_temas.bajada,
				in_temas.texto,
				in_temas.img1,
				in_temas.img2,
				in_temas.fecha,
				in_temas.seo,
				in_categoria_temas.glosa_seo
				
			')
			->from('in_categoria_temas')
			->join('in_sub_categoria_temas','in_categoria_temas.id_categoria = in_sub_categoria_temas.id_categoria')
			->join('in_temas','in_sub_categoria_temas.id_sub_categoria = in_temas.categoria')
			->where('in_temas.estado',"1") 
			->where("seo_sub_categoria",$subcategoria)
			->order_by('fecha','desc');
       		$query = $this->db->get();
            
	   		return $query->result();
	}

	function getInfoDetail($slug){
			$this->db->select('
				in_temas.id,
				in_temas.titulo,
				in_temas.seo,
				in_categoria_temas.glosa_categoria ,
				in_sub_categoria_temas.glosa_sub_categoria,
                in_sub_categoria_temas.seo_sub_categoria,
				in_temas.bajada,
				in_temas.texto,
				in_temas.img1,
				in_temas.img2,
				in_temas.fecha,
				in_temas.estado
				
			')
			->from('in_temas')
			->join('in_sub_categoria_temas','in_temas.categoria = in_sub_categoria_temas.id_sub_categoria')
			->join('in_categoria_temas','in_sub_categoria_temas.id_categoria = in_categoria_temas.id_categoria ')
			->where('in_temas.estado',"1") 
			->where("in_temas.seo",$slug);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result();
	}
    
    function getInfoDetailSp($slug){
			$this->db->select('
				in_temas.id,
				in_temas.titulo,
				in_temas.seo,
				in_categoria_temas.glosa_categoria ,
				in_sub_categoria_temas.glosa_sub_categoria,
                in_sub_categoria_temas.seo_sub_categoria,
				in_temas.bajada,
				in_temas.texto,
				in_temas.img1,
				in_temas.img2,
				in_temas.fecha,
				in_temas.estado
				
			')
			->from('in_temas')
			->join('in_sub_categoria_temas','in_temas.categoria = in_sub_categoria_temas.id_sub_categoria')
			->join('in_categoria_temas','in_sub_categoria_temas.id_categoria = in_categoria_temas.id_categoria ')
			->where('in_temas.estado',"3"); 
		  $query = $this->db->get();
		//	echo $this->db->last_query();
			return $query->result();
	}

 
    
	
	function GetTemaById($id) {
		$this->db->select ( ' * ' )->from ( $this->table )->where ( 'id', $id );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	
	function GetTemaByTitulo($titulo) {
		$this->db->select ( ' * ' )->from ( $this->table )->where("LOWER( REPLACE ( TRIM(titulo), ' ', '-' ))=", $titulo);
		$query = $this->db->get ();
		return $query->result ();
	}
    
    function GetTemaBySeo($seo) {
		$this->db->select ( ' * ' )->from ( $this->table )->where("seo =", $seo);
		$query = $this->db->get ();
		return $query->result ();
	}
	
	
	function GetsOtrosTemas($id) {
		$this->db->select ( ' titulo,id,bajada,categoria,seo,img1,img2,fecha ' )
		->from ( $this->table )
		->where ( 'id <> ', $id )
		->where ( 'estado ', 1 )
		;
		$query = $this->db->get ();
		return $query->result ();
	}
	
	
	
	
	function GetDatosUtiles() {
		$this->db->select ( " * " )->from ( $this->table )->where ( 'categoria', '2' )->where ( 'estado', '1' );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	
	
	function GetTemasInteres() {
		$this->db->select ( ' * ' )->from ( $this->table )->where ( 'categoria', '1' )->where ( 'estado', '1' );
		$query = $this->db->get ();
		return $query->result ();
	}

	function InsertarNuevoTema($data = null) {
		if (is_array ( $data )) {
			$this->db->trans_start ();
			$this->db->insert ( $this->table, $data );
			$insert_id = $this->db->insert_id ();
			$this->db->trans_complete ();
			return $insert_id;
		} else {
			return 'No se pudo insertar la solicitud';
		}
	}
	
	function ActualizarTema($data = null) {
		if (is_array ( $data )) {
			
			$this->db->where ( 'id', $data ['id'] );
			$this->db->update ( $this->table, $data );
			return true;
		} else {
			return false;
		}
	}
	
	
	
function ActivarDesactivar($id= null,$estado= null){
		
	  if ($id>0 ){
		   
           $data = array(
               'estado' => $estado==1? 0 : 1,
            );

            $this->db->where ( 'id',$id );
			$this->db->update ( $this->table, $data );
		 
      
 	        
	   }	
		
  }
	
}