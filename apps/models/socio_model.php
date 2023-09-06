<?php

class Socio_Model extends CI_Model {

    protected $table = 'in_socio';
    function __construct() {
        parent::__construct();
    }

    function getSocios() {
        $this->db->select('*')->from('in_socio');
        $query = $this->db->get();
        return $query->result();
    }


    function getSociosById($id) {
        $this->db->select('*')->from('in_socio')->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }


    function UserData($rut) {


        $this->db->select('	
                in_socio.id,
                in_socio.codigo,
                in_socio.rut,
                in_socio.rutdv,
                in_socio.nombre,
                in_socio.apellido,
                in_socio.estado_civil,
                in_socio.fecha_nacimiento,
                in_socio.direccion,
                in_socio.comuna,
                in_socio.ciudad,
                in_socio.telefono_socio,
                in_socio.anexo,
                in_socio.email,
                in_socio.f_ingreso,
                in_socio.id_cargo,
                in_socio.id_centro_costo,
                in_socio.id_departamento,
                in_socio.estado,
                in_socio.isupdate,
                in_cargo.glosa cargo,
                in_centro_costo.glosa centro_costo,
                in_departamentos.glosa depto
            ')
                ->from($this->table)
                ->join('in_cargo', 'in_socio.id_cargo = in_cargo.id', 'inner')
                ->join('in_centro_costo', 'in_socio.id_centro_costo = in_centro_costo.id', 'inner')
                ->join('in_departamentos', 'in_socio.id_departamento = in_departamentos.id', 'inner')
                ->where('rut', $rut);

        $query = $this->db->get();
        //echo $this->db->last_query();

        return $query->result();
    }

    function isSocio($rut, $pass) {
        $this->db->select('count(*) total')
        ->from($this->table)
        ->where('rut', $rut)
        ->where('password', $pass)
        ->where('estado',1);
        $query = $this->db->get();
        $row = $query->result();

        if ($row[0]->total > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCargos() {
        $this->db->select('*');
        $this->db->from('in_cargo');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCentroCosto() {
        $this->db->select('*');
        $this->db->from('in_centro_costo');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDepartamento() {
        $this->db->select('*');
        $this->db->from('in_departamentos');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCumpleanos() {
        $this->db
                ->select(' 
                rut,
                rutdv,
                nombre,
                apellido,
                fecha_nacimiento,
                fecha_nacimiento,
                in_cargo.glosa as cargo ,
                in_departamentos.glosa as departamento,
                in_centro_costo.glosa as centrocosto
                '
                )
                ->from($this->table)
                ->join('in_cargo', 'in_socio.id_cargo = in_cargo.id')
                ->join('in_departamentos', 'in_socio.id_departamento = in_departamentos.id')
                ->join('in_centro_costo', 'in_socio.id_centro_costo = in_centro_costo.id')
                ->where('MONTH(fecha_nacimiento)', date('m'))
                 ->where('in_socio.estado', 1)
                ->order_by('DAY(fecha_nacimiento) ', 'asc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function getCumpleanosHoy() {
        $this->db
                ->select(' 
                rut,
                rutdv,
                nombre_full,
                apellido,
                fecha_nacimiento,
                imagen_socio,
                in_cargo.glosa as cargo ,
                in_departamentos.glosa as departamento,
                in_centro_costo.glosa as centrocosto'
                )
                ->from($this->table)
                ->join('in_cargo', 'in_socio.id_cargo = in_cargo.id')
                ->join('in_departamentos', 'in_socio.id_departamento = in_departamentos.id')
                ->join('in_centro_costo', 'in_socio.id_centro_costo = in_centro_costo.id')
                ->where('MONTH(fecha_nacimiento)', date('m'))
                ->where('DAY(fecha_nacimiento)', date('d'))
                 ->where('in_socio.estado', 1)
                ->order_by('DAY(fecha_nacimiento) ', 'asc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function InsertarSocio($data = null) {
        if (is_array($data)) {
            $this->db->trans_start();
            $this->db->insert($this->table, $data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return true;
        } else {
            return false;
        }
    }

    function ActualizarSocio($data = null) {
        if (is_array($data)) {
            $this->db->where('id', $data['id']);
            $this->db->update($this->table, $data);
            return true;
        } else {
            return false;
        }
    }

    function getSociosPorGerente($id = null) {

        $this->db->select('	
            in_socio.id,
            in_socio.rut, 
			in_socio.nombre,
			in_socio.apellido, 
			in_socio.codigo,
			in_socio.telefono_socio,
			in_socio.email,
			in_socio.f_ingreso,
			in_socio.id_sucursal,
            in_socio.fecha_nacimiento,
			in_socio.id_tipo,
			in_socio.id_sucursal
			')->from($this->table)->where('id_gerente', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getAgentesTeleventas() {
        //select * from vw_cartola order by fecha desc
        $this->db
                ->select(' * ')
                ->from('in_socio')
                ->where_in('id_tipo', array(4, 7))
                ->order_by("apellido");
        $query = $this->db->get();
        return $query->result();
    }

    function tipo_agente() {

        $this->db->select('*')->from('in_tipo_agente');
        $query = $this->db->get();
        return $query->result();
    }

    function getPuntosSocio($rut) {
        
    }

}
