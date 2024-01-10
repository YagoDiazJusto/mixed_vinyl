<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinyController extends AbstractController{

    #[Route('/')]
    public function homepage(){
        
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        //Función muestra la variable y acaba programa
        //dd($tracks);
        //Similar pero no detiene la página
        //dump($tracks);
        return $this->render('vinyl/homepage.html.twig',['title'=>'PB & Jams','tracks'=>$tracks]);
    }
//Slug es para pasar cualquier cosa(como una variable)
    #[Route('/browse/{slug}')]
    public function browse($slug=null): Response{
        if($slug){
        //importo arriba u que es un paquete de simfony que convierte la cadena en un objeto y puedo usar sus funciones
        $title=u(str_replace("-"," ",$slug))->title(true);
    }else{
        $title="All genres";
    }
    return new Response("Browse: " .$title);
}
}
?>