<?php 

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\model\Entity\Organization;

class Testimony extends Page{

    /**
     * Metodo responsável por retornar o conteúdo (view) de depoimentos
     * @return string
     */
    public static function getTestimonies(){

        //VIEW DE DEPOIMENTOS
        $content= View::render('pages/testimonies', [

        ]);

        // RETORNA A VIEW DA PAGINA
        return parent::getPage('DEPOIMENTOS > WDEV', $content);

    }
}
?>