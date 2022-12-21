<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 text-gray-900">
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form wire:submit.prevent="saveUserVechicle">
                        <div class="form-group">
                            <select wire:model="vechicle_id">
                                <option value="null" selected>Adicionar um carro</option>
                                @foreach ($vechicles as $vechicle)
                                    <option value="{{ $vechicle->id }}">
                                        {{ $vechicle->brand }} - {{ $vechicle->model}} - {{ $vechicle->version}}
                                    </option>
                                @endforeach
                            </select>
                            <button class="mt-4" type="submit" value="Salvar">Salvar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="table table-striped">
                    <thead>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                    </thead>
                    @foreach ($uservechicles[0]->vechicles as $vechicle)
                        <tr>
                            <td>{{ $vechicle->brand }} </td>
                            <td>{{ $vechicle->model }} </td>
                            <td>{{ $vechicle->version }} - {{ now() }}</td>
                            <td>
                                <div>
                                    <div><button wire:click="$refresh">refresh</button></div>
                                    <div><button wire:click="deleteUserVechicle('{{ $vechicle->pivot->id }}')">delete</button></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
<div>

