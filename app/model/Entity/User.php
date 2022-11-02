<?php

namespace App\model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class User{

    /**
     * ID do usuário
     * @var interger
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $nome;

    /**
     * Email do usuário
     * @var string
     */
    public $email;

    /**
     * Senha do usuário
     * @var string
     */
    public $senha;

    /**
     * Método responsável por cadastrar a instancia atual no banco de dados
     * @return boolean
     */
    public function cadastrar(){
        //INSERE A INSTANCIA NO BANCO
        $this->id = (new Database('usuarios'))->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);

        //SUCESSO
        return true;
    }

    
    /**
     * Método responsável por atualizar no banco de dados
     * @return boolean
     */
    public function atualizar(){
        return (new Database('usuarios'))->update('id = '.$this->id,[
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);
    }

    /**
     * Método responsável por excluir um usuario do banco de dados
     * @return boolean
     */
    public function excluir(){
       return (new Database('usuarios'))->delete('id = '.$this->id);
    }

     /**
     * Método responsável por retornar um usuário com base em seu e-mail
     * @param interger $id
     * @return User
     */
    public static function getUserById($id){
        return self::getUsers('id ='.$id)->fetchObject(self::class);
    }

    /**
     * Método responsável por retornar um usuário com base em seu e-mail
     * @param string $email
     * @return User
     */
    public static function getUserByEmail($email){
        return self::getUsers('email ="'.$email.'"')->fetchObject(self::class);
    }

    /**
     * Método responsavel por retornar usiarios
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getUsers($where = null, $order= null, $limit = null, $fields ='*'){
        return (new Database('usuarios'))->select($where,$order,$limit,$fields);
    }
}