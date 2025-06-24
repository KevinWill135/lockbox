<?php

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return views('notas/criar');
    }

    public function store()
    {
        $validacao = Validacao::validar([
            'titulo' => ['required', 'min:3', 'max:255'],
            'nota' => ['required'],
        ], $_POST);

        if ($validacao->naoPassou()) {
            return views('notas/criar');
        }

        Nota::create(
            request()->post('titulo'),
            encrypt(request()->post('nota'))
        );

        flash()->push('mensagem', 'Nota criada com Sucesso 👍!!');

        return redirect('/notas');
    }
}
