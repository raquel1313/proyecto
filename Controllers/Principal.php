<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        
    }
    //vista about
    public function about()
    {
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 20;
        $desde = ($pagina -1)* $porPagina;
        $total = $this->model->getTotalEventos();
        $data['total'] = ceil($total['TOTAL']/ $porPagina);
        $data['pagina'] = $pagina;
        $data['title'] = 'eventos';
        $data['evento'] = $this->model->getEventos($desde, $porPagina);
        $this->views->getView('principal', "about", $data);
    }
    public function evento($id_eve)
    {
        $data ['evento'] = $this->model->getEvento($id_eve);
        $data['title'] = $data ['evento'] ['id_eve'];
        $this->views->getView('principal', "evento", $data);
    }
    //vista contacto
    public function contacto()
    {
        $data['title'] = 'contacto';
        $this->views->getView('principal', "contact", $data);
    }
    //vista productos
    public function producto($page)
    {
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 20;
        $desde = ($pagina -1)* $porPagina;
        $total = $this->model->getTotalProductos();
        $data['pagina'] = $pagina;
        $data['total'] = ceil($total['TOTAL']/ $porPagina);
        $data['title'] = 'productos';
        $data['productos'] = $this->model->getProducto($desde, $porPagina);
        $this->views->getView('principal', "shop", $data);
    }
    //vista compra
    public function compra($id_prod)
    {
        $data ['producto'] = $this->model->getProductos($id_prod);
        $id_cat = $data['producto'] ['categoria_id'];
        $data ['relacionados'] = $this->model->getAleatorios($id_cat);
        $data['title'] = $data ['producto'] ['nombre_prod'];
        $this->views->getView('principal', "shop-single", $data);
    }
    public function categorias($datos)
    {
        $id_cat = 1;
        $page = 1;
        $array = explode(',' , $datos);
        if(isset($array[0])){
            if(!empty($array[0])){
                $id_cat = $array[0];
            }
            
        }
        if(isset($array[1])){
            if(!empty($array[1])){
                $id_cat = $array[1];
            }
            
        }
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 20;
        $desde = ($pagina -1)* $porPagina;
        $total = $this->model->getTotalProductosCat($id_cat);
        $data['pagina'] = $pagina;
        $data['total'] = ceil($total['TOTAL']/ $porPagina);
        $data ['productos'] = $this->model->getProductosCat($id_cat,$desde, $porPagina);
        $data['title'] = 'categorias';
        $data['id_cat'] = $id_cat;
        $this->views->getView('principal', "categorias", $data);
    }
}