<?php

namespace App\Controllers\Notas;

use App\Models\Nota;
use Core\Validacao;

class AtualizarController
{
    public function __invoke()
    {
        $atualizarNota = session()->get('mostrar');

        $validacao = Validacao::validar(array_merge([
            'titulo' => ['required', 'min:3', 'max:255'],
            'id' => ['required'],
        ], $atualizarNota ? ['nota' => ['required']] : []), request()->all());

        if ($validacao->naoPassou()) {
            return redirect('/notas?id='.request()->post('id'));
        }

        Nota::update(
            request()->post('id'),
            request()->post('titulo'),
            request()->post('nota')
        );

        flash()->push('mensagem', 'Registro atualizado com sucesso');

        return redirect('/notas');
    }
}
