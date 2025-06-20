<div class="flex space-x-4 z-1 p-1">
        <form action="/notas" method="get" class="w-full">
                <label class="input w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        stroke-width="2.5"
                                        fill="none"
                                        stroke="currentColor">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                </g>
                        </svg>
                        <input
                                type="text"
                                name="pesquisa"
                                class="grow"
                                placeholder="Pesquisar notas..."
                                value="<?= request()->get('pesquisa') ?>" />
                </label>
        </form>
        <a href="/notas/criar" class="btn btn-primary">+ item</a>
</div>