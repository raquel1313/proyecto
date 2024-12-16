<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos($id_prod)
    {
        $sql = "SELECT p.*, c.nombre_cat FROM producto p INNER JOIN categoria c ON p.categoria_id = c.id_cat WHERE p.id_prod = $id_prod" ;
         return $this->select($sql);
    }
    public function getProducto($desde, $porPagina)
    {
        $sql = "SELECT * FROM producto LIMIT $desde, $porPagina" ;
         return $this->selectAll($sql);
    }
    public function getTotalProductos()
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM producto " ;
         return $this->select($sql);
    }
    public function getProductosCat($id_cat,$desde, $porPagina)
    {
        $sql = "SELECT * FROM producto WHERE categoria_id = $id_cat LIMIT $desde, $porPagina" ;
         return $this->selectAll($sql);
    }
    public function getTotalProductosCat($id_cat)
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM producto WHERE categoria_id = $id_cat" ;
         return $this->select($sql);
    }
    public function getTotalEventos()
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM evento " ;
         return $this->select($sql);
    }
    public function getEventos($desde, $porPagina)
    {
        $sql = "SELECT * FROM evento LIMIT $desde, $porPagina" ;
         return $this->selectAll($sql);
    }
    public function getEvento($id_eve)
    {
        $sql = "SELECT *   FROM evento  WHERE id_eve = $id_eve" ;
         return $this->select($sql);
    }
    public function getAleatorios($id_cat)
    {
        $sql = "SELECT * FROM producto WHERE categoria_id = $id_cat ORDER BY RAND() LIMIT 20" ;
         return $this->selectAll($sql);
    }

}
 
?>