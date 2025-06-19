<?php

use App\Models\Usuario;
use Core\Database;
use Core\Validacao;


/**
 * 1. Receber o formulário com email e senha
 * 2. fazer consulta no banco de dados com email e senha
 * 3. Se existir nós vamos adicionar na sessão que o usuários está autenticado
 * 4. Mudar a informação no nosso navbar pra mostrar o nome do usuário
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database = new Database(config('database'));
        $email = $_POST['email'];
        $password = $_POST['password'];

        $validacao = Validacao::validar([
                'email' => ['required', 'email'],
                'password' => ['required']
        ], $_POST);

        if ($validacao->naoPassou()) {
                views('login');
                exit;
        }

        $usuario = $database->query(
                query: "SELECT * FROM usuarios WHERE email = :email",
                class: Usuario::class,
                params: [
                        'email' => $email
                ]
        )->fetch();

        if ($usuario && password_verify($_POST['password'], $usuario->senha)) {

                //validando a senha
                $_SESSION['auth'] = $usuario;

                flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome . '!');

                header('location: /dashboard');
                exit();
        } else {
                flash()->push('validacoes', ['email' => ['Email ou senha estão incorretos']]);
        }
}

views('login');
