<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>

                    @if (count($mascotas) > 0)
                        <div class="flex justify-around bg-slate-400 p-3">
                            <p class="text-center  text-2xl text-semibold text-white font-serif">
                                Registrados</p>
                            <a href="{{ route('clientes.create') }}"> <button
                                    class="p-2 rounded-md bg-indigo-500 text-white font-semibold">Registrarse</button></a>
                        </div>
                        <div class="grid bg-slate-400 px-16 grid-cols-1 sm:grid-cols-4 gap-5">

                            @foreach ($mascotas as $mascota)
                                <div class="mx-auto overflow-hidden rounded shadow-lg mb-6 sm:max-w-md">


                                    @if ($mascota->categoria === 'perro')
                                        <img class="w-full"
                                            src="https://cdn.icon-icons.com/icons2/1465/PNG/512/441dogface_100527.png"
                                            alt="Plate of rice">
                                    @else
                                        <img class="w-full"
                                            src="https://cdn.icon-icons.com/icons2/317/PNG/512/cat-icon_34469.png"
                                            alt="Plate of rice">
                                    @endif

                                    <div class="px-6 py-4 bg-slate-100">
                                        <div class="mb-2 text-lg text-justify ">
                                            Mi(s) mascota(s) es:

                                            <span class="font-bold uppercase">{{ $mascota->nombre }}</span>

                                            y tengo <span class="font-bold">

                                                <span class="font-bold uppercase">{{ $mascota->edad }}</span>

                                                meses
                                            </span>

                                        </div>
                                        <p class="mb-4 text-base  text-justify ">
                                            Mi dueño es: <span class="font-medium uppercase">
                                                {{ $mascota->cliente ?  $mascota->cliente->nombres : $mascota }}
                                            </span>contactame al numero: <span class="font-medium uppercase">
                                                {{ $mascota->cliente ? $mascota->cliente->numeroCelular : ''  }}
                                            </span>

                                        </p>
                                    </div>


                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-16">
                            Aun no hay clientes registrados en la base de datos <br>
                            <a href="{{ route('clientes.create') }}"> <button
                                    class="px-3 py-2 m-2 bg-indigo-500 text-white font-semibold">Registrase</button></a>

                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
