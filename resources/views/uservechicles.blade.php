<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seus veículos') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <select id="vechicle_id" name="vechicle_id" class="form-control">
                            <option value="">Deseja inserir um novo veículo?</option>
                        @foreach ($vechicles as $vechicle)
                            <option value="{{ $vechicle->id}}">
                            {{ $vechicle->brand . ' - ' . $vechicle->model . ' - '. $vechicle->version}}
                            </option>
                        @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-lg" onclick="newVechicle()">Cadastrar novo veículo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                          @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                        <table class="table table-striped">
                            <thead>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Tipo</th>
                                <th>Opções</th>
                            </thead>
                            <tbody id="vechiclesList">
                            @foreach ($uservechicles[0]->vechicles as $vechicle)
                              <tr>
                                    <td>{{ $vechicle->brand }} </td>
                                    <td>{{ $vechicle->model }} </td>
                                    <td>{{ $vechicle->version }}</td>
                                    <td>
                                        <button type="button" class="btn"
                                        onclick="deleteuservechicle({{ $vechicle->pivot->id }})">
                                        Remover</button>
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                        onclick="setid({{ $vechicle->pivot->id }},{{$vechicle->id}})"
                                        data-bs-target="#schedule">Agendar manutenção</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div>
    </div>
    <!-- modal -->

    <div class="modal fade" id="schedule" tabindex="-1" aria-labelledby="scheduleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" class="form-horizontal" action={{ route('create.maintanance') }}>
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="scheduleLabel">Agendar Manutenção</h1>
                    </div>
                <div class="modal-body">

                    @csrf
                    <input type="hidden" id="user_vechicle_id" name="user_vechicle_id" value="null">
                    <input type="hidden" id="maintanance_vechicle_id" name="maintanance_vechicle_id" value="null">
                    <label for="date" class="form-label">Data:</label>
                    <input type="date" class="form-control" name="date" required>
                    <label for="type_maintanance" class="form-label">Tipo de serviço</label>
                    <select class="form-control" name="type_maintanance">
                        @foreach ($maintanance as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn" value="Agendar">
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- fim modal -->
<script>

    function setid(user_vechicle_id,maintanance_vechicle_id){
        console.log(user_vechicle_id, maintanance_vechicle_id);
        document.getElementById('user_vechicle_id').setAttribute('value',user_vechicle_id);
        document.getElementById('maintanance_vechicle_id').setAttribute('value',maintanance_vechicle_id);

    }

    async function getUserVechicles() {
        url=window.location.hostname;
        let response = await fetch('/uservechicles');
        var vechicles = await response.json();
        console.log(vechicles[0].vechicles);

        await listVechicles(vechicles[0].vechicles);
    }

    function listVechicles(vechicles) {
        var node = document.getElementById("vechiclesList").innerHTML = '';
        for(vechicle of vechicles) {
            console.log(vechicle)
            let tr = document.createElement("tr");
            var tdbrand = document.createElement("td");
            var tdmodel = document.createElement("td");
            var tdversion = document.createElement("td");
            var tdaction = document.createElement("td");
            var buttondelete = document.createElement("button");
            var buttonschedule = document.createElement("button");

            tdbrand.innerText = vechicle.brand;
            tdmodel.innerText = vechicle.model;
            tdversion.innerText = vechicle.version;
            buttondelete.innerText = 'Remover';
            buttondelete.setAttribute('onclick',`deleteuservechicle(${vechicle.pivot.id})`);
            buttonschedule.setAttribute('type', 'button');
            buttonschedule.setAttribute('class', 'btn');
            buttonschedule.setAttribute('data-bs-toggle','modal');
            buttonschedule.setAttribute('onclick',`setid(${vechicle.pivot.id}, ${vechicle.id})`)
            buttonschedule.setAttribute('data-bs-target','#schedule')
            buttonschedule.innerText = 'Agendar Manutenção';

            document.getElementById("vechiclesList").appendChild(tr);
            tr.appendChild(tdbrand);
            tr.appendChild(tdmodel);
            tr.appendChild(tdversion);
            tr.appendChild(tdaction);
            tdaction.appendChild(buttondelete);
            tdaction.appendChild(buttonschedule);

        }

    }

    async function newVechicle() {
        let _data = {
            'vechicle_id': document.getElementById('vechicle_id').value
        };
        console.log(_data);
        let insert = await fetch('/uservechicle', {
            method: 'POST',
            body: JSON.stringify(_data),
            headers: {
            "Content-type": "application/json",
            "Access-Control-Allow-Credentials": true,
            "credentials": "include",
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
            'url': 'adduservechicle',

        });

        getUserVechicles();

    }

    async function deleteuservechicle(pivotId) {
        let deleteuservechicle = await fetch(`/uservechicle/${pivotId}`, {
            method : 'DELETE',
                    headers: {
            "Content-type": "application/json",
            "Access-Control-Allow-Credentials": true,
            "credentials": "include",
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
        });

        getUserVechicles();
    }
</script>
</x-app-layout>
