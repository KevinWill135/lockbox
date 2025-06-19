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
                        <form method="post" action="/login">
                                <?php
                                $validacoes = flash()->get('validacoes');
                                $mensagem = flash()->get('mensagem');
                                ?>
                                <?php if (isset($mensagem)): ?>
                                        <div role="alert" class="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span><?= $mensagem ?></span>
                                        </div>
                                <?php endif; ?>
                                <div class="card">
                                        <div class="card-body">
                                                <div class="card-title">Faça seu login</div>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Email</span>
                                                        </div>
                                                        <input
                                                                type="text"
                                                                name="email"
                                                                class="input input-neutral w-full max-w-xs bg-white"
                                                                value="<?= old('email') ?>" />
                                                        <?php if (isset($validacoes['email'])): ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>
                                                        <?php endif; ?>
                                                </label>
                                                <label for="" class="form-control w-full max-w-xs">
                                                        <div class="label">
                                                                <span class="label-text text-black">Senha</span>
                                                        </div>
                                                        <input type="password" name="password" class="input input-neutral w-full max-w-xs bg-white" />
                                                        <?php if (isset($validacoes['password'])): ?>
                                                                <div class="label text-xs text-error"><?= $validacoes['password'][0] ?></div>
                                                        <?php endif; ?>
                                                </label>
                                                <div class="card-actions justify-end">
                                                        <button class="btn btn-primary btn-block">Login</button>
                                                        <a href="/registrar" class="btn btn-link">Quero me registrar</a>
                                                </div>
                                        </div>
                                </div>
                        </form>
                </div>

        </div>

</div>