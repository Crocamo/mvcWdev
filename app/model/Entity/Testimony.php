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

        //INSERE DEPOIMENTO NO BANCO DE DADOS
        $this->id = (new Database('depoimentos'))->insert([
            'nome'     => $this->nome,
            'mensagem' => $this->mensagem,
            'data'     => $this->data
        ]);

        //SUCESSO
        return true;
    }

    /**
     * Método responsável por atualizar os dados do banco com a instancia atual
     * @return boolean
     */
    public function atualizar()
    {
        //ATUALIZA DEPOIMENTO NO BANCO DE DADOS
        return (new Database('depoimentos'))->update('id = '.$this->id,[
            'nome'     => $this->nome,
            'mensagem' => $this->mensagem
        ]);
    }

    /**
     * Método responsável por excluir um depoimento do banco de dados
     * @return boolean
     */
    public function excluir()
    {
        //EXCLUI DEPOIMENTO NO BANCO DE DADOS
        return (new Database('depoimentos'))->delete('id = '.$this->id);
    }

    /**
     * Método responsavel por retornar um Depoimento com base no seu ID
     * @param interger $id
     * @return Testimony
     */
    public static function getTestimoniesById($id)
    {
        return self::getTestimonies('id = '.$id)->fetchObject(self::class);
    }

    /**
     * Método responsavel por retornar Depoimentos
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getTestimonies($where = null, $order= null, $limit = null, $fields ='*'){
        return (new Database('depoimentos'))->select($where,$order,$limit,$fields);
    }
}
