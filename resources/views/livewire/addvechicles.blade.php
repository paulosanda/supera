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

