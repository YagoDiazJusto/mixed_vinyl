<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinyController{

    #[Route('/')]
    public function homepage(){
        return new Response('Title: PB and Jams');
    }
//Slug es para pasar cualquier cosa(como una variable)
    #[Route('/task/{slug}')]
    public function performtask($slug=null): Response{
        if($slug){
        //importo arriba u que es un paquete de simfony que convierte la cadena en un objeto y puedo usar sus funciones
        $title=u(str_replace("-"," ",$slug))->title(true);
    }else{
        return new Response(null);
    }
    return new Response("Browse: " .$title);
}
}
?>