<?php
    
    class ModeloEquipo{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
        }
   
        public function obtenerEquipos($id = null){
            if (isset($id)){
                $sentencia = $this->db->prepare("SELECT * FROM equipos WHERE id_equipo = ?");
                $sentencia->execute([$id]);
                return $sentencia->fetch(PDO::FETCH_OBJ);
            }
            $sentencia = $this->db->prepare("SELECT id_equipo,pais,puntos,pj,pg,pe,pp,gf,gc,dif,nombre as grupo FROM (equipos INNER JOIN grupos) WHERE equipos.fk_id_grupo = grupos.id_grupo");
            $sentencia->execute();
            return $sentencia->fetchALL(PDO::FETCH_OBJ);
        }

        public function obtenerEquiposGrupo($grupo){

            $sentencia = $this->db->prepare("SELECT pais,puntos,pj,pg,pe,pp,gf,gc,dif,nombre as grupo FROM (equipos INNER JOIN grupos) WHERE equipos.fk_id_grupo = grupos.id_grupo AND grupos.id_grupo = ?");
            $sentencia->execute([$grupo]);
            return $sentencia->fetchALL(PDO::FETCH_OBJ);
        }

        public function agregarEquipo($equipo){
            $sentencia = $this->db->prepare("INSERT INTO equipos (pais, puntos, pj, pg, pe, pp, gf, gc, dif, fk_id_grupo) VALUES (:pais,:puntos,:pj,:pg,:pe,:pp,:gf,:gc,:dif,:fk_id_grupo)");
            $sentencia->execute($equipo);
        }

        public function modificarEquipo($equipo){
            $sentencia =$this->db->prepare("UPDATE equipos SET pais=:pais,puntos=:puntos,pj=:pj,pg=:pg,pe=:pe,pp=:pp,gf=:gf,gc=:gc,dif=:dif,fk_id_grupo=:fk_id_grupo WHERE id_equipo=:id_equipo");
            $sentencia->execute($equipo);
            return $sentencia->rowCount();
        }

        public function eliminarEquipo($id){
            $equipoEliminado=$this->db->prepare("DELETE FROM equipos WHERE id_equipo=?");
            $equipoEliminado->execute([$id]);
            return $equipoEliminado->rowCount();
        }
    }