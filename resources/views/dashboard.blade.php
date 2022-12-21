<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped">
                        <thead>
                            <th>Veículo</th>
                            <th>Próxima manutenção</th>
                            <th>Serviço</th>
                        </thead>
                        @foreach ($maintanance as $m)
                            <tr>
                                <td>{{ $m->vechicles->brand .' - '. $m->vechicles->model }}</td>
                                <td> {{ date('d/m/Y', strtotime($m->next_maintanance)) }}</td>
                                <td>{{ $m->type_maintanance }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
