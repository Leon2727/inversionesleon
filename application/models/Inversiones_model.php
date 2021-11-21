
<?php
class Inversiones_model extends CI_Model{
    function listar(){
        $this->db->order_by("id_inversion","desc");
        return $this->db->get("inversiones")->result_array();
    }

    function listar_de_usuario($id_usuario=""){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->get("inversiones")->result_array();
    }

    function agregar($monto="",$id_usuario="",$nombre="",$resultado=0){

        $this->db->set("monto",$monto);
        $this->db->set("resultado",$resultado);
        $this->db->set("id_usuario",$id_usuario);
        $this->db->set("nombre",$nombre);
        $this->db->insert("inversiones");
    }

    function borrar($inversion_id=0){
        $this->db->where("id_inversion",$inversion_id);
        $this->db->limit(1);
        $this->db->delete("inversiones");
        return $this->db->affected_rows();
    }
    public function cambiarbalance($inversion_id="",$monto="")
    {
        $this->db->where("id_inversion",$inversion_id);
        $this->db->limit(1);
        $this->db->set("resultado",$monto);
        $this->db->update("inversiones");
    }
    public function traerultima($id_usuario="")
    { $this->db->where("id_usuario",$id_usuario);
        $this->db->order_by("id_inversion","desc");
        $this->db->limit(1);
        return $this->db->get("inversiones")->row_array();
    }
}
?>