<?php
Class M_salary extends CI_Model {


	function daftar(){
			$this->db->select('name.name,name.id as idname,work.id as idwork, work.name as workname, category.id as idcategory, category.salary');
			//$this->db->order_by('ruang', 'asc');
			$this->db->where("name.id_work = work.id");
			$this->db->where("name.id_salary = category.id");
			$query = $this->db->get('name, category, work');

			return $query->result();
	}

	function kec_option(){
			$this->db->select('*');
			//$this->db->order_by('ruang', 'asc');
			//$this->db->where("sekolah_asal.id_kec = kecamatan.id_kec");
			$query = $this->db->get('kecamatan');

			return $query->result();
	}

	function getKodeSalary(){
        $q = $this->db->query("select MAX(RIGHT(id,2)) as code_max from name");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%0s", $tmp);
            }
        }else{
            $code = "1";
        }
        return "".$code;
    }

		function get_salary($id_salary)
	{
		$this->db->select('name.name,name.id as idname, work.name as work, work.id as idwork, category.id as idsalary, category.salary');
		//$this->db->order_by('ruang', 'asc');
		$this->db->where("name.id_work = work.id");
		$this->db->where("name.id_salary = category.id");
		$Q = $this->db->get('name, category, work');

		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data = $row;
			}
			} else{
				$data = null;
			}
		$Q->free_result();
		return $data;
	}


	function save(){
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $work = $this->input->post('work');
    $salary = $this->input->post('salary');
    $data = array(
	  'id'=>$id,
	  'name'=>$name,
	  'id_work'=>$work,
	  'id_salary'=>$salary
    );

    $this->db->insert('name',$data);	//insert penerima
	}

	function update(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$work = $this->input->post('idwork');
		$salary = $this->input->post('salary');
        $data = array(
	  //'id'=>$id,
	  'name'=>$name,
		'id_work'=>$work,
	  'id_salary'=>$salary
    );
    $this->db->where('id',$id);
    $this->db->update('name',$data);
	}

}
?>
