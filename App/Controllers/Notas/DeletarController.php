<?php

namespace App\Controllers\Notas;

use Core\Database;
use Core\Validacao;

class DeletarController
{
        public function __invoke()
        {
                $validacao = Validacao::validar([
                        'id' => ['required']
                ], request()->all());

                if ($validacao->naoPassou()) {
                        return redirect("/notas?id=" . request()->post('id'));
                }

                $db = new Database(config('database'));

                $db->query(
                        query: "DELETE FROM notas
                                WHERE id = :id
                        ",
                        params: ['id' => request()->post('id')]
                );

                flash()->push('mensagem', 'Registro deletado com sucesso');
                return redirect('/notas');
        }
}
