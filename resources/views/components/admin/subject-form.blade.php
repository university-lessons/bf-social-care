<form action="{{ $action }}" method="POST">
    @csrf
    <div class="space-y-4 rounded bg-white p-4">

        <h2 class="font-medium text-gray-500">Informações obrigatórias</h2>

        <label for="name">Nome</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="name" id="name" placeholder="Fulano da Silva"
            value="{{ old('name', $subject['name'] ?? '') }}" />
        @error('name')
            <p class="-mt-4 mb-4 text-sm text-red-500">{{ $message }}</p>
        @enderror

        <div class="flex flex-col space-x-0 md:flex-row md:space-x-4">
            <div class="flex-1">
                <label for="close_relative">Nome da mãe (ou parente/conhecido próximo)</label>
                <input
                    class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
                    type="text" name="close_relative" id="close_relative" placeholder="Ciclana da Silva">
            </div>

            <div class="mt-4 md:mt-0">
                <label for="close_relative_degree">Grau de parentesco</label>
                <select name="close_relative_degree"
                    class="h-8 w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
                    <option value="mother">Mãe</option>
                    <option value="father">Pai</option>
                    <option value="relative">Parente próximo(a)</option>
                    <option value="friend">Amigo(a)</option>
                </select>
            </div>
        </div>

        <label for="birthdate">Data de nascimento</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="date" name="birthdate" id="birthdate">

    </div>

    <div class="mt-4 space-y-4 rounded bg-white p-4">
        <h2 class="font-medium text-gray-500">Informações adicionais</h2>

        <label for="cpf">CPF</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="cpf" id="cpf" placeholder="000.000.000-00" />

        <label for="rg">RG</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="rg" id="rg" placeholder="00.000.000-00" />

        <label for="birthplace">Localidade de nascimento</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="birthplace" id="birthplace" placeholder="Endereço..." />

        <label for="address">Endereço atual (ou o da última residência)</label>
        <textarea
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="address" id="address"></textarea>

        <label for="origin_unit">Unidade de origem (caso venha transferido)</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="origin_unit" id="origin_unit" />

        <label for="destination_unit">Unidade de destino (caso seja transferido)</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="destination_unit" id="destination_unit" />
    </div>

    <div class="mt-4 space-y-4 rounded bg-white p-4">
        <h2 class="font-medium text-gray-500">Contato familiar</h2>

        <label for="family_telephone">Telefone(s)</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="family_telephone" id="family_telephone" placeholder="(00) 0000-0000" />

        <label for="family_address">Endereço</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="family_address" id="family_address" placeholder="Endereço da familia..." />

        <fieldset>
            <legend>Vínculo familiar:</legend>

            <div class="flex flex-row md:space-x-4">
                <div>
                    <input type="radio" id="family_relationship" name="family_relationship" value="active" />
                    <label for="huey">Ativo</label>
                </div>

                <div>
                    <input type="radio" id="family_relationship" name="family_relationship" value="weakened" />
                    <label for="dewey">Fragilizado</label>
                </div>
            </div>
        </fieldset>
    </div>



    <div class="mt-4 space-y-4 rounded bg-white p-4">
        <h2 class="font-medium text-gray-500">Informações demográficas</h2>

        <label for="religion">Religião</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="religion" id="religion" />

        <label for="color">Cor declarada</label>
        <select name="color"
            class="h-8 w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            <option value=" ">Não informada</option>
            <option value="preto">Preto(a)</option>
            <option value="pardo">Pardo(a)</option>
            <option value="indigeno">Indígeno(a)</option>
            <option value="branco">Branco(a)</option>
            <option value="Amarelo">Amarelo(a)</option>
        </select>

        <label for="income">Faixa de renda</label>
        <select name="income"
            class="h-8 w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            <option value=" ">Não informada</option>
            <option value="zero">Sem rendimento</option>
            <option value="2900">Até R$ 2900</option>
            <option value="7100">De R$ 2900 a R$ 7100</option>
            <option value="22000">De R$ 7100 a R$ 22000</option>
            <option value="superior">Superior a R$ 22000</option>
        </select>
    </div>

    <div class="mt-4 space-y-4 rounded bg-white p-4">
        <h2 class="font-medium text-gray-500">Outros</h2>

        <label for="chemical_dependency">Dependência química</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="chemical_dependency" id="chemical_dependency" />

        <label for="crime_article">Artigo da pena</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="crime_article" id="crime_article" />

        <label for="crime_status">Status da condenação</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            type="text" name="crime_status" id="crime_status" />
    </div>

    <div class="mb-4 mt-4 flex justify-end rounded bg-white p-4">

        <button
            class="inline-flex cursor-pointer rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
            type="submit">Cadastrar</button>
    </div>
</form>
