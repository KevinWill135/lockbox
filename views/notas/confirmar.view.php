<?php $validacoes = flash()->get('validacoes') ?>
<div class="bg-base-300 rounded-box w-full font-bold pt-20 flex flex-col items-center">
        <form action="/mostrar" method="post" class="max-w-sm flex flex-col gap-4">
                <div>
                        Digite a sua senha novamente para começar a ver todas as suas notas descriptografadas
                </div>
                <label class="flex flex-col gap-2 w-full">
                        <div class="label">
                                <span class="label-text">Senha</span>
                        </div>
                        <input type="password" name="password" class="input input-neutral bg-white text-black w-full" />
                        <?php if (isset($validacoes['password'])) { ?>
                                <div class="label text-xs text-error"><?= $validacoes['password'][0] ?></div>
                        <?php } ?>
                </label>
                <button class="btn btn-primary">Abrir minhas notas</button>
        </form>
</div>