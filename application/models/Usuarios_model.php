<?php

class Usuarios_model extends CI_Model{
    public function verificar($usuario="",$password=""){
       $this->db->select("usuario_id");
       $this->db->where("usuario",$usuario); 
       $this->db->where("password",$password);
       $this->db->limit(1);
       
       $res=$this->db->get("usuarios");
       if($res->num_rows()){
            $temp=$res->row_array();
            $this->actualiza_ult_login($temp["usuario_id"]);

            return $temp["usuario_id"];
       }else{
            return false;
       }
    }

    public function obtener($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        return $res->row_array();
    }

    public function actualiza_ult_login($usuario_id=""){
        $this->db->where("usuario",$usuario_id);
        $this->db->limit(1);
        $this->db->set("ultlogin","NOW()",false);
        $this->db->update("usuarios");
    }
    public function cambiarpass($usuario_id="",$pass=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->set("password",$pass,false);
        $this->db->update("usuarios");
    }
    function agregar($nombre="",$email="",$password=""){

        $this->db->set("usuario",$nombre);
        $this->db->set("email",$email);
        $this->db->set("password",$password);
        $this->db->insert("usuarios");
    }

    public function verif_nombre($nombre=""){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$nombre); 
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
             $temp=$res->row_array();
             return $temp["id_usuario"];
        }else{
             return false;
        }
     }

     public function verif_email($email=""){
        $this->db->select("usuario_id");
        $this->db->where("email",$email); 
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
             $temp=$res->row_array();
             return $temp["usuario_id"];
        }else{
             return false;
        }
     }
}

?>