<div class="grid grid-cols-2">
        <div class="hero min-h-screen flex ml-40">
                <div class="hero-content -mt-20">
                        <div>
                                <p class="py-2 text-xl">Bem vindo Ao</p>
                                <h1 class="text-6xl font-bold">LockBox</h1>
                                <p class="pt-2 pb-4 text-xl">
                                        Onde você guarda <span class="italic">tudo</span> com segurança
                                </p>
                        </div>
                </div>
        </div>
        <div class="bg-white hero mr-40 min-h-screen text-black">
                <div class="hero-content -mt-20">
                        <form method="post" action="/registrar">
                                <?php $validacoes = flash()->get('validacoes'); ?>
                                <div class="card">
                                        <div class="card-body">
                                                <div class="card-title">Crie sua conta</div>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Nome</span>
                                                        </div>
                                                        <input type="text" placeholder="Digite aqui..." name="nome" class="input input-neutral w-full max-w-xs bg-white">
                                                        <?php if (isset($validacoes['nome'])) { ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['nome'][0] ?></div>
                                                        <?php } ?>
                                                </label>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Email</span>
                                                        </div>
                                                        <input type="text" placeholder="Digite aqui..." name="email"
                                                                value="<?= old('email') ?>" class="input input-neutral w-full max-w-xs bg-white">
                                                        <?php if (isset($validacoes['email'])) { ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>
                                                        <?php } elseif (isset($validacoes['email'][2])) { ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['email'][2] ?></div>
                                                        <?php } ?>
                                                </label>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Confirme seu email</span>
                                                        </div>
                                                        <input type="text" placeholder="Digite aqui..." name="email_confirm" class="input input-neutral w-full max-w-xs bg-white">
                                                        <?php if (isset($validacoes['email'][1])) { ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['email'][1] ?></div>
                                                        <?php } ?>
                                                </label>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Senha</span>
                                                        </div>
                                                        <input type="password" placeholder="Digite aqui..." name="password" class="input input-neutral w-full max-w-xs bg-white">
                                                        <?php if (isset($validacoes['password'])) { ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['password'][0] ?></div>
                                                        <?php } ?>
                                                </label>
                                                <div class="card-actions justify-end">
                                                        <button class="btn btn-primary btn-block">Registrar</button>
                                                        <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                                                </div>
                                        </div>
                                </div>
                        </form>
                </div>

        </div>

</div>