<?php $validacoes = flash()->get('validacoes'); ?>

<div class="bg-base-300 rounded-tl-box w-56">
        <div class="bg-base-200 p-4 rounded-tl-box">
                <h3>+ Nova nota</h3>
        </div>
</div>
<div class="bg-base-200 rounded-r-box w-full p-10">
        <form action="/notas/criar" method="post">

                <div class="p-5 flex flex-col space-y-4">
                        <fieldset class="fieldset">
                                <legend class="fieldset-legend">Titulo</legend>
                                <input type="text" name="titulo" class="input w-full" placeholder="Type here" />
                                <?php if (isset($validacoes['titulo'])) { ?>
                                        <div class="label text-xs text-error"><?= $validacoes['titulo'][0] ?></div>
                                <?php } ?>
                        </fieldset>
                        <fieldset class="fieldset">
                                <legend class="fieldset-legend">Sua nota</legend>
                                <textarea name="nota" class="textarea h-24 w-full" placeholder="Bio"></textarea>
                                <?php if (isset($validacoes['nota'])) { ?>
                                        <div class="label text-xs text-error"><?= $validacoes['nota'][0] ?></div>
                                <?php } ?>
                        </fieldset>
                </div>
                <div class="flex justify-end items-center">
                        <button class="btn btn-primary">Salvar</button>
                </div>
        </form>
</div>