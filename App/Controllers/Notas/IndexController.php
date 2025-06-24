<?php

namespace App\Controllers\Notas;

use App\Models\Nota;

class IndexController
{
    public function __invoke()
    {

        $notas = Nota::all(request()->get('pesquisa'));

        if (! $notaSelecionada = $this->getNotaSelecionada($notas)) {
            return views('notas/nao-encontrada');
        }

        return views('notas/index', [
            'notas' => $notas,
            'notaSelecionada' => $notaSelecionada,
        ]);
    }

    private function getNotaSelecionada($notas)
    {
        $id = request()->get('id', '', (count($notas) > 0 ? $notas[0]->id : null));

        $filtro = array_filter($notas, fn ($n) => $n->id == $id);

        return array_pop($filtro);
    }
}
