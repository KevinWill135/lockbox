<?php

use Core\Database;

use Core\Validacao;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database = new Database(config('database'));

        $validacao = Validacao::validar([
                'nome' => ['required'],
                'email' => ['required', 'email', 'unique:usuarios', 'confirmed'],
                'password' => ['required', 'min:8', 'max:30', 'strong']
        ], $_POST);

        if ($validacao->naoPassou('registrar')) {
                header('location: /login');
                exit();
        }

        $database->query(
                query: "INSERT INTO usuarios(nome, email, senha) VALUES(:nome, :email, :senha)",
                params: [
                        'nome' => $_POST['nome'],
                        'email' => $_POST['email'],
                        'senha' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]
        );

        flash()->push('mensagem', 'Registrado com Sucesso 👍!!');
        header('Location: /login');
        exit();
}

views('registrar');
