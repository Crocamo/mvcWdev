<?php 

namespace App\Controller\Admin;

use \App\Utils\View;


class Testimony extends Page{

    /**
     * Método responsável por renderizar a view de home do painel
     * @param Request
     * @return string
     */
    public static function getTestimonies($request){
        //CONTEÚDO DA HOME
        $content = View::render('admin/modules/testimonies/index',[]);

        //RETORNA A PÁGINA COMPLETA
        return parent::getPainel('depoimentos > WDEV',$content,'testimonies');

    }
}