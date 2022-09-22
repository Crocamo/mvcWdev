<?php 

namespace App\Controller\Pages;

use \App\Utils\View;

class Page{

    /**
     * Método responsável por renderizar o header da página.
     * @return String 
     */
    private static function getHeader(){
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o footer da página.
     * @return String 
     */
    private static function getFooter(){
        return View::render('pages/footer');
    }

    /**
     * Metodo responsável por retornar o conteúdo (view) da nossa pagina generica
     * @return string
     */
    public static function getPage($title,$content){
        return View::render('pages/page', [
            'title' => $title,
            'header'=>self::getHeader(),
            'content' => $content,
            'footer'=>self::getFooter()
        ]);

    }
}
?>