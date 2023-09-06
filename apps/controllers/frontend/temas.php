<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        } else {
            $this->load->model('temas_model');
            $this->load->model('socio_model', 'socio');
            $this->load->model('banners_model', 'banner');
            $this->load->library('NumeroALetras');
            $this->load->library('html2pdf');
            $this->load->helper('download');
        }
    }

    public function Index($categoria = 0, $subcategoria = 0) {
        
    }
    
    public function descargar($file){
        $fn=$file.'.pdf';
        $data = file_get_contents("http://rrhh.caren.cl/assets/frontend/liquidaciones/".$fn); // Read the file's contents
        force_download($fn,$data);
        die();
    }
    
    function idea(){
        
            $this->load->library('upload');
            $this->load->library('form_validation');
            
             $this->form_validation->set_rules('idea', 'Mensaje', 'required|trim|xss_clean');
            
            
            
          
             
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('errors', validation_errors());
                redirect(BASE_URL . 'temas/comercial-e-incentivo/super-idea');
            }
        
            
            $imagen_mini ['upload_path'] = './assets/frontend/ideas/';
            $imagen_mini ['allowed_types'] = 'docx|doc|pdf';
            //$imagen_mini ['file_name'] = $this->input->post('rutdv');
            $imagen_mini ['overwrite'] = TRUE;
            $imagen_mini ['max_size'] = '3000';
            $sbi = $this->SubirImagen($imagen_mini, 'file');
        
            if (is_array($sbi) && count($sbi) > 0) {
            
        
            $d['texto']=$this->input->post('idea');
            $d['archivo']=$sbi['file_name'];
            $d['fecha']=date("Y-m-d H:m:s");
            $d['socio']=$this->session->userdata('rutliq');
            $d['nombre']=$this->session->userdata('nombre') .' ' . $this->session->userdata('apellido');;
        
        
            $this->db->insert('in_nuevas_ideas',$d);
             $this->session->set_flashdata('bien', "Tu super idea se a registrado de manera correcta");
             redirect(BASE_URL . 'temas/comercial-e-incentivo/super-idea');
           }else{
            
             $this->session->set_flashdata('errors', $sbi);
             redirect(BASE_URL . 'temas/comercial-e-incentivo/super-idea');
           }  
        
    }

    public function contenido($categoria = 0, $subcategoria = 0, $detalle = 0) {

    

        //$vacas= $this->__vacaciones($this->session->userdata('id'));

        $datos['categoria'] = $categoria;
        $datos['subcategoria'] = $subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($subcategoria);
        $datos['contenido'] = $this->temas_model->getInfo($categoria, $subcategoria);
        $datos['cumples'] = $this->socio->getCumpleanos();
        $datos['areas'] = $this->socio->getCentroCosto();
        $datos['vacaciones'] = $this->__vacaciones($this->session->userdata('rutliq'));
        $datos['content'] = '/frontend/temas/desplegartema';
        $datos['titulo'] = "Caren";

      

        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

    function calcular() {
        $CantidadDiasHabiles = DiasHabiles($this->input->post('inicio'), $this->input->post('fin'));
        if ($CantidadDiasHabiles == 'e1') {
            $err_data = array(
                "success" => "err",
                "msg" => 'Las Fechas son requeridas',
            );
            echo json_encode($err_data);
            die();
        }

        if ($CantidadDiasHabiles == 'e2') {
            $err_data = array(
                "success" => "err",
                "msg" => 'La fecha de inicio no puede ser mayor a la de termino',
            );
            echo json_encode($err_data);
            die();
        }

        if ($CantidadDiasHabiles > $this->input->post('total')) {
            $err_data = array(
                "success" => "err",
                "msg" => 'No tienes sufucientes dias',
            );
            echo json_encode($err_data);
            die();
        }

        //$vacaciones[0]->saldo+$vacaciones[0]->acumulados;

        $vacaciones = $this->__vacaciones($this->session->userdata('rutliq'));
        $total = $this->input->post('total');
        $err_data = array(
            "success" => "ok",
            "nombre" => $this->session->userdata('apellido') . ' ' . $this->session->userdata('nombre'),
            "rut" => $this->session->userdata('rutliq'),
            "saldo" => $vacaciones[0]->saldo,
            "acumulado" => $vacaciones[0]->acumulados,
            "fecha_ingreso" => $this->session->userdata('fecha_registro'),
            "inicio" => $this->input->post('inicio'),
            "final" => $this->input->post('fin'),
            "dias" => $CantidadDiasHabiles,
            "letras" => NumeroALetras::convertir($CantidadDiasHabiles) . ' DIAS',
            "progresivas" => $this->input->post('progr') == "" ? 0 : $this->input->post('progr'),
            "total" => $this->input->post('total'),
        );

        //print_r($err_data);
        
        $n = $this->pdf($err_data);

        $err_data = array(
            "success" => "ok",
            "nombre" => $this->session->userdata('apellido') . ' ' . $this->session->userdata('nombre'),
            "rut" => $this->session->userdata('rutliq'),
            "saldo" => $vacaciones[0]->saldo,
            "acumulado" => $vacaciones[0]->acumulados,
            "fecha_ingreso" => $this->session->userdata('fecha_registro'),
            "inicio" => $this->input->post('inicio'),
            "final" => $this->input->post('fin'),
            "dias" => $CantidadDiasHabiles,
            "letras" => NumeroALetras::convertir($CantidadDiasHabiles) . ' DIAS',
            "progresivas" => $this->input->post('progr') == "" ? 0 : $this->input->post('progr'),
            "total" => $this->input->post('total'),
            "nombre" => $n
        );


        echo json_encode($err_data);
    }

    private function __vacaciones($rut) {
        $this->db->select('*')->from('in_vacaciones')->where('rut', $rut);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    public function detalle($categoria = '', $subcategoria = '', $slug = "") {

        die();

        if ($slug == 'beneficios-de-la-mutual-de-seguridad') {
            $datos ['contenido'] = $this->temas_model->getInfoDetailSp($slug);
        } else {
            $datos ['contenido'] = $this->temas_model->getInfoDetail($slug);
        }
        $datos ['content'] = '/frontend/temas/desplegar_contenido';
        $datos ['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

    public function VerTema($tema) {
        die();
        $datos ['temas'] = $this->temas_model->GetTemaBySeo($tema);
        $datos ['otros'] = $this->temas_model->GetsOtrosTemas($datos ['temas'] [0]->id);
        $datos ['camino_migas'] = array(
            'INICIO' => BASE_URL,
            'TEMAS' => BASE_URL . "temas/" . $datos ['temas'] [0]->seo,
            $datos ['temas'] [0]->titulo => BASE_URL . "temas/" . str_replace(' ', '-', strtolower($datos ['temas'] [0]->titulo))
        );
        $datos ['content'] = '/frontend/temas/desplegartema';
        $datos ['titulo'] = "Ruta Paraiso";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

    function Listado($categoria = null) {
        $datos ['temas'] = $this->temas_model->ListarTemas();
        $datos ['camino_migas'] = array(
            'INICIO' => BASE_URL,
            'TEMAS' => BASE_URL . "temas/" . $datos ['temas'] [0]->seo,
            $datos ['temas'] [0]->titulo => BASE_URL . "temas/" . str_replace(' ', '-', strtolower($datos ['temas'] [0]->titulo))
        );
        $datos ['content'] = '/frontend/temas/listado';
        $datos ['titulo'] = "Ruta Paraiso";
        $this->load->view('frontend/layout', $datos);
    }

    function autocomplete() {
        $this->db->select("nombre_full")
                ->from('in_socio')
                ->like('nombre_full', $this->input->post('query'))
                ->where('in_socio.estado',1)
                ->order_by('apellido', 'desc');
        $query = $this->db->get();
        foreach ($query->result() as $r) {
            $data[] = $r->nombre_full;
        }
        echo json_encode($data);
    }

    public function pdf($data) {
        $fn = (object) $this->__CreaPDF($data);
        return $fn->filename;
        // si existe el archivo empezamos la descarga del pdf
        if (file_exists("assets/comprobantes/" . $fn->filename)) {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-disposition: attachment; filename=' . basename($fn->route));
            header("Content-Type: application/pdf");
            header("Content-Transfer-Encoding: binary");
            header('Content-Length: ' . filesize($fn->route));
            readfile($fn->route);
        }
    }

    function __CreaPDF($data) {
        $html = $this->__cpdf($data);
        //$nombre_pdf = rand(1,1000000)."_comprobante_vacaciones" . '.pdf';
        $nombre_pdf = acentos($data['nombre']) . '.pdf';

        $html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', array(
            5,
            0,
            5,
            0
        ));
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('assets/comprobantes/' . $nombre_pdf, 'F');
        if (is_dir("./assets/comprobantes/")) {
            // ruta completa al archivo
            $route = base_url() . "assets/comprobantes/{$nombre_pdf}";
            $filename = "{$nombre_pdf}";
            $return = array("filename" => $filename, "route" => $route);
            $this->session->set_userdata($return);
            return $return;
        }



        /* if (file_exists("assets/cupones/" . $nombre_pdf)) {
          $route = base_url("assets/comprobantes/{$nombre_pdf}");
          $filename = "{$nombre_pdf}";
          return array("filename"=>$filename,"route"=>$route);

          }else{
          $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', array(
          5,
          0,
          5,
          0
          ));
          $html2pdf->WriteHTML($html);
          $html2pdf->Output('assets/cupones/'.$nombre_pdf,'F');
          if (is_dir("./assets/cupones/")) {
          // ruta completa al archivo
          $route = "assets/cupones/{$nombre_pdf}";
          $filename = "{$nombre_pdf}";
          $return=array("filename"=>$filename,"route"=>$route);
          $this->session->set_userdata($return);
          return $return;
          }

          } */
    }

    private function __cpdf($info) {
        $data['info'] = $info;
        return $this->load->view('frontend/vacaciones/pdf', $data, TRUE);
    }

    function anexo() {
        $this->db->select("
        in_socio.rutdv,
        in_socio.nombre_full,
        in_cargo.glosa cargo, 
        in_centro_costo.glosa cc,
        in_departamentos.glosa depto,
        in_socio.telefono_socio,
        in_socio.celular_socio,
        in_socio.anexo,
        in_socio.email,
        in_socio.fecha_nacimiento
        ")
                ->from('in_socio')
                ->join('in_cargo', 'in_socio.id_cargo = in_cargo.id','left')
                ->join('in_centro_costo', 'in_socio.id_centro_costo = in_centro_costo.id','left')
                ->join('in_departamentos', 'in_socio.id_departamento = in_departamentos.id','left')
                ->like('in_socio.nombre_full', $this->input->post('name'))
                ->where('in_socio.estado',1)
                ->order_by('apellido', 'desc');

        $query = $this->db->get();
        //echo $this->db->last_query();  
        //print_r($query->result());  
        $html = "";
        foreach ($query->result() as $row) {



            $html .= '
                <div class="col-md-12 noticias-bienestar-box">
                    <div class="col-md-3">
                        <img  class="img-responsive"  src="' . base_url() . 'assets/frontend/img/personal/' . $row->rutdv . '.jpg"  alt="">
                    </div>
                    <div class="col-md-9">
                     <div class="col-md-4 no-padding">Nombre :</div>
                     <div class="col-md-8 no-padding">' . $row->nombre_full . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Cargo :</div>
                     <div class="col-md-8 no-padding">' . $row->cargo . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Departamento :</div>
                     <div class="col-md-8 no-padding">' . $row->depto . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Centro Costo :</div>
                     <div class="col-md-8 no-padding">' . $row->cc . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Telefono :</div>
                     <div class="col-md-8 no-padding">' . $row->telefono_socio . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Anexo :</div>
                     <div class="col-md-8 no-padding">' . $row->anexo . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Celular :</div>
                     <div class="col-md-8 no-padding">' . $row->celular_socio . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">E-mail :</div>
                     <div class="col-md-8 no-padding">' . $row->email . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Cumplea&ntilde;os:</div>
                     <div class="col-md-8 no-padding">' . date('d-m', strtotime($row->fecha_nacimiento)) . '</div>
                       <div class="clearfix"></div>
                    </div> 
                   
                </div>
                <div class="clearfix"></div>
         
         ';
        }

        echo $html;
    }

    function area() {
        $this->db->select("
        in_socio.rutdv,
        in_socio.nombre_full,
        in_cargo.glosa cargo, 
        in_centro_costo.glosa cc,
        in_departamentos.glosa depto,
        in_socio.telefono_socio,
        in_socio.celular_socio,
        in_socio.anexo,
        in_socio.email,
        in_socio.fecha_nacimiento
        ")
                ->from('in_socio')
                ->join('in_cargo', 'in_socio.id_cargo = in_cargo.id')
                ->join('in_centro_costo', 'in_socio.id_centro_costo = in_centro_costo.id')
                ->join('in_departamentos', 'in_socio.id_departamento = in_departamentos.id')
                ->where('in_socio.id_centro_costo', $this->input->post('area'))
                 ->where('in_socio.estado',1)
                ->order_by('apellido', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();  
        //print_r($query->result());  
        $html = "";
        foreach ($query->result() as $row) {



            $html .= '
                <div class="col-md-12 noticias-bienestar-box">
                    <div class="col-md-3">
                        <img  class="img-responsive"  src="' . base_url() . 'assets/frontend/img/personal/' . $row->rutdv . '.jpg"  alt="">
                    </div>
                    <div class="col-md-9">
                     <div class="col-md-4 no-padding">Nombre :</div>
                     <div class="col-md-8 no-padding">' . $row->nombre_full . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Cargo :</div>
                     <div class="col-md-8 no-padding">' . $row->cargo . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Departamento :</div>
                     <div class="col-md-8 no-padding">' . $row->depto . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Centro Costo :</div>
                     <div class="col-md-8 no-padding">' . $row->cc . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Telefono :</div>
                     <div class="col-md-8 no-padding">' . $row->telefono_socio . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Anexo :</div>
                     <div class="col-md-8 no-padding">' . $row->anexo . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Celular :</div>
                     <div class="col-md-8 no-padding">' . $row->celular_socio . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">E-mail :</div>
                     <div class="col-md-8 no-padding">' . $row->email . '</div>
                     <div class="clearfix"></div>
                     <div class="col-md-4 no-padding">Cumplea&ntilde;os:</div>
                     <div class="col-md-8 no-padding">' . date('d-m', strtotime($row->fecha_nacimiento)) . '</div>
                       <div class="clearfix"></div>
                    </div> 
                   
                </div>
                <div class="clearfix"></div>
         
         ';
        }

        echo $html;
    }

    function SubirImagen($data = null, $campo = null) {
        $this->upload->initialize($data);
        if (!$this->upload->do_upload($campo)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

    function ajaxPaginationData() {
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        //total rows count
        $totalRec = count($this->post->getRows());

        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'posts/ajaxPaginationData';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['posts'] = $this->post->getRows(array('start' => $offset, 'limit' => $this->perPage));

        //load the view
        $this->load->view('posts/ajax-pagination-data', $data, false);
    }

    function desplegar() {
        
    }

}
