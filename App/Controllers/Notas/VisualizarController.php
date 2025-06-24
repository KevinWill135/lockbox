<?php

namespace App\Controllers\Notas;

use Core\Validacao;

class VisualizarController
{
    public function mostrar()
    {

        $validacao = Validacao::validar([
            'password' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return views('notas/confirmar');
        }

        if (! (password_verify(request()->post('password'), auth()->senha))) {
            flash()->push('validacoes', ['password' => ['Senha incorreta']]);

            return views('notas/confirmar');
        }

        session()->set('mostrar', true);

        return redirect('/notas');
    }

    public function esconder()
    {
        session()->forget('mostrar');

        return redirect('/notas');
    }

    public function confirmar()
    {
        return views('notas/confirmar');
    }
}
