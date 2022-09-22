<?php
namespace App\model\Entity;

class Testimony{

    /**
     * ID do depoimento
     * @var interger
     */
    public $id;

     /**
     * Nome do usuário que fez o depoimento
     * @var string
     */
    public $nome;

     /**
     * Mensagens do depoimento
     * @var string
     */
    public $mensagem;

     /**
     * Data de publicação do depoimento
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar a instancia atual do banco de dados
     * @return boolean
     */
    public function cadastrar(){

    }
}