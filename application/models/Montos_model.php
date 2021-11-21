
<?php
class Montos_model extends CI_Model{
    function listar(){
        $this->db->order_by("monto_id","desc");
        return $this->db->get("montos")->result_array();
    }

    function listarporusuario($id_usuario=""){
        $this->db->where("id_usuario",$id_usuario); 
        $this->db->order_by("monto_id","desc");
        return $this->db->get("montos")->result_array();
    }

    function obtener_primero($id_inversion=""){
        $this->db->where("id_inversion",$id_inversion); 
        $this->db->order_by("monto_id","asc");
        $this->db->limit(1);
        return $this->db->get("montos")->row_array();
    }

    function obtener_ultimo($id_inversion=""){
        $this->db->where("id_inversion",$id_inversion); 
        $this->db->order_by("monto_id","desc");
        $this->db->limit(1);
        return $this->db->get("montos")->row_array();
    }

    function calcular_acumulado($id_inversion=""){
        $primero=$this->obtener_primero($id_inversion);
        $ultimo=$this->obtener_ultimo($id_inversion);
        if($primero and $ultimo){
            if($primero["monto_id"]==$ultimo["monto_id"]){
                return 0;
            }else{
                return $ultimo["monto"]-$primero["monto"];
            }
        }else{
            return 0;
        }
    }

    function agregar($monto=0,$id_inversion="",$id_usuario=""){
        $ultimo=$this->obtener_ultimo($id_inversion);
        if($ultimo){
            $this->db->set("diferencia",$monto-$ultimo["monto"]);
        }else{
            //Es inicio de fondo
            $this->db->set("diferencia",'NULL', false);
        }
        $this->db->set("monto",$monto);
        $this->db->set("id_inversion",$id_inversion);
        $this->db->set("id_usuario",$id_usuario);
        $this->db->insert("montos");
    }

    function borrar($monto_id=0){
        $this->db->where("monto_id",$monto_id);
        $this->db->limit(1);
        $this->db->delete("montos");
        return $this->db->affected_rows();
    }
}
?>