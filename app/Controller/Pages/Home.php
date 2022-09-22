<?php 

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\model\Entity\Organization;

class Home extends Page{

    /**
     * Metodo responsável por retornar o conteúdo (view) da nossa home
     * @return string
     */
    public static function getHome(){
        //ORGANIZAÇÃO
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content= View::render('pages/home', [
            'name' => $obOrganization->name
        ]);

        // RETORNA A VIEW DA PAGINA
        return parent::getPage('HOME > WDEV', $content);

    }
}
?>