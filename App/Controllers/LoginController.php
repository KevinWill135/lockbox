<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;
use App\Models\Usuario;



class LoginController
{
        public function index()
        {
                return views('login');
        }

        public function login()
        {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $validacao = Validacao::validar([
                        'email' => ['required', 'email'],
                        'password' => ['required']
                ], $_POST);

                if ($validacao->naoPassou()) {
                        return views('login');
                }

                $database = new Database(config('database'));

                $usuario = $database->query(
                        query: "SELECT * FROM usuarios WHERE email = :email",
                        class: Usuario::class,
                        params: [
                                'email' => $email
                        ]
                )->fetch();

                if (!($usuario && password_verify($_POST['password'], $usuario->senha))) {
                        flash()->push('validacoes', ['email' => ['Email ou senha estão incorretos']]);
                        return views('login');
                }

                //validando a senha
                $_SESSION['auth'] = $usuario;

                flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome . '!');

                return redirect('/dashboard');
        }
}
