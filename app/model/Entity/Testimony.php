<?php

namespace App\model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Testimony
{

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
    public function cadastrar()
    {
        //DEFINE A DATA

        $this->data = date('Y-m-d H:i:s');

        $this->id = (new Database('depoimentos'))->insert([
            'nome'     => $this->nome,
            'mensagem' => $this->mensagem,
            'data'     => $this->data
        ]);

        //SUCESSO
        return true;
    }

    /**
     * Método responsavel por retornar Depoimentos
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     * 
     */
    public static function getTestimonies($where = null, $order= null, $limit = null, $fields ='*'){
        return (new Database('depoimentos'))->select($where,$order,$limit,$fields);
    }
}
