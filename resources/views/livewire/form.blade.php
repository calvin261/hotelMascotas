<form class=" flex flex-col justify-center align-center my-3"
    wire:submit.prevent="submit">
    @if (session()->has('message'))
        <div id="message"
            class="bg-blue-100  text-center p-5 w-full  rounded">
            <div class="flex justify-between">
                <div class="flex space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        class="flex-none fill-current text-blue-500 h-4 w-4">
                        <path
                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z" />
                    </svg>
                    <div class="flex-1 leading-tight text-sm text-blue-700 font-medium">
                        {!! session('message') !!}</div>
                </div>

            </div>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


        {{ $response }}
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('cedula') }}"
                wire:model="cedula"
                type="text"
                placeholder="Cedula">
            @error('cedula')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('nombre') }}"
                wire:model="nombre"
                type="text"
                placeholder="Nombre">
            @error('nombre')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Fecha de Nacimiento</label>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('fechaNacimiento') }}"
                wire:model="fechaNacimiento"
                type="date">
            @error('fechaNacimiento')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('numeroCelular') }}"
                wire:model="numeroCelular"
                type="number"
                placeholder="Número de Celular">
            @error('numeroCelular')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('direccion') }}"
                type="text"
                wire:model="direccion"
                placeholder="Dirección">
            @error('direccion')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('cuidad') }}"
                type="text"
                wire:model="cuidad"
                placeholder="Cuidad">
        </div>
        <div>
            <input
                class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                value="{{ old('email') }}"
                type="email"
                wire:model="email"
                placeholder="Correo Electrónico">
            @error('email')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
        </div>

    </div>
    <p class="text-2xl font-semibold my-2">Registro de la Mascota</p>
    <div class=" flex flex-col justify-center align-center  my-3">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <input
                    class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                    value="{{ old('nombre') }}"
                    wire:model="nombreMascota"
                    type="text"
                    placeholder="Nombre">
                @error('nombreMascota')
                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input
                    class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                    value="{{ old('edad') }}"
                    wire:model="edad"
                    type="text"
                    placeholder="Edad en meses">
                @error('edad')
                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div> <input
                    class="w-full bg-gray-200 my-2 px-4 py-2 border-b-2 border-0 border-gray-400 outline-transparent focus:ring-indigo-600 focus:ring-1 focus:outline-transparent focus:rounded-md  focus:border-gray-400"
                    value="{{ old('raza') }}"
                    wire:model="raza"
                    type="text"
                    placeholder="Raza">
                @error('raza')
                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <p class="text-xl text-center font-semibold">Escoja la Categoria de la mascota</p>
                <div class="flex justify-center ">
                    <label class="mx-5"
                        for="perro"> <input type="radio"
                            value="perro"
                            wire:model="categoria"
                            id="perro">Perro</label>
                    <label for="gato"> <input type="radio"
                            value="gato"
                            wire:model="categoria"
                            id="gato">Gato</label>
                </div>
                @error('categoria')
                    <span class="text-red-500 font-semibold">{{ $message }}</span>
                @enderror
            </div>


        </div>
        <div>
            <a href="{{ route('clientes.index') }}"> <button type="button"
                    class="px-3 py-2 mt-3 rounded-md hover:bg-gray-800 cursor-pointer bg-gray-600 mx-auto w-1/3 text-white uppercase font-semibold">Cancelar</button></a>
            <input
                class="px-3 py-2 mt-3 rounded-md hover:bg-indigo-800 cursor-pointer bg-indigo-600 mx-auto w-1/3 text-white uppercase font-semibold"
                type="submit">
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        window.livewire.on('alert_remove', () => {
            setTimeout(function() {
                $("#message").fadeOut('fast');
            },2000); // 3 secs
        });
    });
</script>
