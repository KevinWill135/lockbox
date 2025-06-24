<?php

namespace App\Controllers;

use App\Models\Usuario;
use Core\Database;
use Core\Validacao;

class LoginController
{
    public function index()
    {
        return views('login', template: 'guest');
    }

    public function login()
    {
        $email = request()->post('email');
        $password = request()->post('password');

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return views('login', template: 'guest');
        }

        $database = new Database(config('database'));

        $usuario = $database->query(
            query: 'SELECT * FROM usuarios WHERE email = :email',
            class: Usuario::class,
            params: [
                'email' => $email,
            ]
        )->fetch();

        if (! ($usuario && password_verify($password, $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['Email ou senha estão incorretos']]);

            return views('login', template: 'guest');
        }

        // validando a senha
        session()->set('auth', $usuario);
        // $_SESSION['auth'] = $usuario;

        flash()->push('mensagem', 'Seja bem vindo '.$usuario->nome.'!');

        return redirect('/notas');
    }
}
