<?php

namespace App\Models;

use Carbon\Carbon;
use Core\Database;

class Nota
{
        public $id;

        public $usuario_id;

        public $titulo;

        public $nota;

        public $data_criacao;

        public $data_atualizacao;

        public function dataCriacao()
        {
                return Carbon::parse($this->data_criacao);
        }

        public function dataAtualizacao()
        {
                return Carbon::parse($this->data_atualizacao);
        }

        public function nota()
        {

                if (session()->get('mostrar')) {
                        return decrypt($this->nota);
                }

                return str_repeat('*', strlen($this->nota));
        }

        public static function all($pesquisar = null)
        {
                $db = new Database(config('database'));

                return $db->query(
                        query: 'SELECT * FROM notas WHERE usuario_id = :usuario_id ' . (
                                $pesquisar ? 'AND titulo LIKE :pesquisar' : null
                        ),
                        class: self::class,
                        params: array_merge(['usuario_id' => auth()->id], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])
                )->fetchAll();
        }

        public static function update($id, $titulo, $nota)
        {
                $db = new Database(config('database'));

                $set = 'titulo = :titulo';

                if ($nota) {
                        $set .= ' , nota = :nota';
                }

                $db->query(
                        query: "UPDATE notas SET 
                                $set
                                WHERE id = :id
                        ",
                        params: array_merge([
                                'titulo' => request()->post('titulo'),
                                'id' => request()->post('id'),
                        ], $nota ? ['nota' => encrypt($nota)] : [])
                );
        }

        public static function create($titulo, $nota)
        {
                $database = new Database(config('database'));

                $database->query(
                        query: 'INSERT INTO notas(usuario_id, titulo, nota, data_criacao, data_atualizacao) VALUES(:usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao)',
                        params: [
                                'usuario_id' => auth()->id,
                                'titulo' => $titulo,
                                'nota' => $nota,
                                'data_criacao' => date('Y-m-d H:i:s'),
                                'data_atualizacao' => date('Y-m-d H:i:s'),
                        ]
                );
        }
}
