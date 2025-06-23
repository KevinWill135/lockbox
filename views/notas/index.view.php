<?php $validacoes = flash()->get('validacoes'); ?>

<ul class="bg-base-300 rounded-l-box w-56 flex flex-col divide-y divide-base-100">
        <?php foreach ($notas as $key => $nota): ?>
                <a
                        href="/notas?id=<?= $nota->id ?><?= request()->get('pesquisa', '&pesquisa=') ?>"
                        class="w-full p-4 cursor-pointer hover:bg-base-200 
                        <?php if ($key == 0): ?> rounded-tl-box <?php endif; ?>
                        <?php if ($nota->id == $notaSelecionada->id): ?> bg-base-200 <?php endif; ?>
                                ">
                        <?= $nota->titulo ?>
                </a>
        <?php endforeach; ?>
</ul>

<div class="bg-base-200 rounded-r-box w-full p-10">
        <form action="/nota" method="post" id="form-atualizacao">
                <input type="hidden" name="__method" value="PUT" />
                <input type="hidden" name="id" value="<?= $notaSelecionada->id ?>">

                <div class="p-5 flex flex-col space-y-4">
                        <fieldset class="fieldset">
                                <legend class="fieldset-legend">Titulo</legend>
                                <input
                                        type="text"
                                        name="titulo"
                                        class="input w-full"
                                        placeholder="Type here"
                                        value="<?= $notaSelecionada->titulo ?>" />
                                <?php if (isset($validacoes['titulo'])): ?>
                                        <div class="label text-xs text-error"><?= $validacoes['titulo'][0] ?></div>
                                <?php endif; ?>
                        </fieldset>
                        <fieldset class="fieldset">
                                <legend class="fieldset-legend">Sua nota</legend>
                                <textarea
                                        name="nota"
                                        class="textarea h-24 w-full"
                                        placeholder="Bio"><?= $notaSelecionada->nota ?></textarea>
                                <?php if (isset($validacoes['nota'])): ?>
                                        <div class="label text-xs text-error"><?= $validacoes['nota'][0] ?></div>
                                <?php endif; ?>
                        </fieldset>
                </div>
        </form>
        <div class="flex justify-between items-center">
                <form action="/nota" method="post">
                        <input type="hidden" name="__method" value="DELETE" />
                        <input type="hidden" name="id" value="<?= $notaSelecionada->id ?>">
                        <button type="submit" class="btn btn-error">Deletar</button>
                </form>
                <button type="submit" form="form-atualizacao" class="btn btn-primary">Atualizar</button>
        </div>

</div>