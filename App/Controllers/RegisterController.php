<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;

class RegisterController
{
        public function index()
        {
                return views('registrar', template: 'guest');
        }

        public function register()
        {
                $validacao = Validacao::validar([
                        'nome' => ['required'],
                        'email' => ['required', 'email', 'unique:usuarios', 'confirmed'],
                        'password' => ['required', 'min:8', 'max:30', 'strong']
                ], $_POST);

                if ($validacao->naoPassou()) {
                        return views('registrar', template: 'guest');
                }

                $database = new Database(config('database'));

                $database->query(
                        query: "INSERT INTO usuarios(nome, email, senha) VALUES(:nome, :email, :senha)",
                        params: [
                                'nome' => $_POST['nome'],
                                'email' => $_POST['email'],
                                'senha' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                        ]
                );

                flash()->push('mensagem', 'Registrado com Sucesso 👍!!');
                return redirect('/login');
        }
}
