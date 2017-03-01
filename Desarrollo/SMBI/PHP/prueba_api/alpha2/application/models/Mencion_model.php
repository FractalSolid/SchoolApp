<?php
class Mencion_model extends CI_Model {



        public function __construct()
        {
                $this->load->database();
        }


        public function get_mencion($id = FALSE)
		{
		        if ($id === FALSE)
		        {
		               $query = $this->db->get('mencion');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('mencion', array('idMencion' => $id));
		        return $query->row_array();
		}


		public function get_asignatura($id = FALSE)
		{
		        if ($id === FALSE)
		        {
		                return "";
		        }

		        $query = $this->db->get_where('Asignatura_has_Curso_has_alumno_idAsignatura', array('idAsignatura' => $id));
		        return $query->row_array();
		}
		public function get_curso($id = FALSE)
		{
		        if ($id === FALSE)
		        {
		                return "";
		        }

		        $query = $this->db->get_where('Asignatura_has_Curso_has_alumno_idCurso', array('idCurso' => $id));
		        return $query->row_array();
		}

		public function get_alumno($id = FALSE)
		{
		        if ($id === FALSE)
		        {
		                return "";
		        }

		        $query = $this->db->get_where('Asignatura_has_Curso_has_alumno_idAlumno', array('idAlumno' => $id));
		        return $query->row_array();
		}

		

		public function post_mencion($mencion)
		{
		        $res=$this->db->set( $this->_setmencion($mencion) )->insert("mencion");
		        return $res;
		       
		}

		public function put_mencion($data)
		{
		       
				$mencion = $this->_setmencion($data);
				$this->db->where('idMencion', $data['idMencion']);
				$res = $this->db->update('mencion', $data);
				return $res;
		}

		public function delete_mencion($id)
		{
		         $test = $this->db->get_where('mencion', array('idMencion' => $id));
				
				if (!empty($test))
            {
		        $res=$this->db->delete('mencion', array('idMencion' => $id));
		    }

		    else
		    	{$res = FALSE;}

		        return $res;
		}

		public function _setmencion($mencion)
		{
			$data1 = array(

		        'Asignatura_has_Curso_has_Alumno_idCurso' => $mencion["Asignatura_has_Curso_has_Alumno_idCurso"],
		        'Asignatura_has_Curso_has_Alumno_idAsignatura' => $mencion["Asignatura_has_Curso_has_Alumno_idAsignatura"],
		        'Asignatura_has_Curso_has_Alumno_idAlumno' => $mencion["Asignatura_has_Curso_has_Alumno_idAlumno"],
		        'titulo' => $mencion["titulo"]
	        );

	        return $data1;
		}


}


?>