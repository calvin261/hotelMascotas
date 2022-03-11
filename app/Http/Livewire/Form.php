<?php

namespace App\Http\Livewire;

use App\Jobs\SendEmailJob;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Form extends Component
{
    public $nombre;
    public $cedula;
    public $fechaNacimiento;
    public $numeroCelular;
    public $direccion;
    public $cuidad;
    public $email;
    public $nombreMascota;
    public $edad;
    public $raza;
    public $categoria;
    public $clienteConocido = false;
    public $clienteId;
    public $response;
    private $token;

    protected $rules = [
        'nombre' => 'required',
        'cedula' => 'required|numeric|digits:10',
        'fechaNacimiento' => 'required|date',
        'numeroCelular' => 'required|numeric|digits:10',
        'email' => 'required|email',
        'nombreMascota' => 'required',
        'edad' => 'numeric',
        'raza' => 'required',
        'categoria' => 'required|in:gato,perro'
    ];
    function clear()
    {
        $this->nombre = '';
        $this->cedula = '';
        $this->fechaNacimiento = '';
        $this->numeroCelular = '';
        $this->direccion = '';
        $this->cuidad = '';
        $this->email = '';
        $this->nombreMascota = '';
        $this->edad = '';
        $this->raza = '';
        $this->categoria = '';


        $this->response = '';
        $this->token = '';
    }

    public function getToken()
    {
        $a = Http::withBasicAuth('SEGUROS', 'pruebas2021*')
            ->asForm()->post('http://magnussucre.magnusmassoft.com/wsdl/tokenApp', [
                'grant_type' => 'client_credentials'
            ]);
        $this->token = $a['token'];
    }
    public function updatedCedula()
    {
        if (strlen($this->cedula) === 10) {

            $this->searchingMyBDD();
        } else {
            session()->flash('message', 'Numero de cedula no valida. Debe tener 10 caracteres');
        }
    }
    function searchingMyBDD()
    {
        session()->flash('message', 'buscando...');
        $cliente = Cliente::where('cedula', 'like', $this->cedula)->first();

        if ($cliente) {
            $this->updatingDataWithBBDD($cliente);
        } else {

            $this->searchingOnWS();
        }
    }
    function searchingOnWS()
    {

        $this->getToken();
        $cliente = Http::withToken($this->token)->post('http://magnussucre.magnusmassoft.com/wsdl/customerApp', [
            'document' =>  $this->cedula
        ]);

        if (strlen($cliente['mensaje']['first_name']) > 0) {
            $this->clear();
            $this->updatingDataWithWS($cliente['mensaje']);
        } else {
            session()->flash('message', 'Usuario no encontrado');

            $this->emit('alert_remove');
        }
    }
    function updatingDataWithWS($data)
    {
        $this->clienteConocido = true;
        $this->nombre = $data['first_name'] . ' ' . $data['last_name'] . ' ' . $data['second_name'] . ' ' . $data['second_last_name'];
        $this->cedula = $data['document'];
        $this->cuidad = $data['city'];
        $this->email = $data['email'];
        $this->emit('alert_remove');
    }
    function updatingDataWithBBDD($data)
    {
        $this->clienteId = $data->id;
        $this->clienteConocido = true;
        $this->nombre = $data->nombres;
        $this->cedula =  $data->cedula;
        $this->fechaNacimiento =  $data->fechaNacimiento;
        $this->numeroCelular =  $data->numeroCelular;
        $this->direccion =  $data->direccion;
        $this->cuidad = $data->cuidad;
        $this->email = $data->email;

        $this->emit('alert_remove');
    }
    public function render()
    {
        return view('livewire.form');
    }
    public function submit()
    {
        $validatedData = $this->validate();
        try {
            $cliente = Cliente::where('cedula', 'like', $this->cedula)->first();
            if ($cliente) {
                $cliente->update([
                    'nombres' => $validatedData['nombre'],
                    'fechaNacimiento' => $validatedData['fechaNacimiento'],
                    'numeroCelular' => $validatedData['numeroCelular'],
                    'direccion' => $this->direccion,
                    'cuidad' => $this->cuidad,
                    'email' => $validatedData['email'],
                ]);
            } else {
                $cliente  = Cliente::create([
                    'nombres' => $validatedData['nombre'],
                    'cedula' => $validatedData['cedula'],
                    'fechaNacimiento' => $validatedData['fechaNacimiento'],
                    'numeroCelular' => $validatedData['numeroCelular'],
                    'direccion' => $this->direccion,
                    'cuidad' => $this->cuidad,
                    'email' => $validatedData['email'],
                ]);
            }
            Mascota::create([
                'nombre' => $validatedData['nombreMascota'],
                'edad' => $validatedData['edad'],
                'raza' => $validatedData['raza'],
                'categoria' => $validatedData['categoria'],
                'cliente_id' => $cliente->id,
            ]);
            session()->flash('message', 'Registro guardado satisfactoriamente');



            $details['email'] = $validatedData['email'];

            dispatch(new SendEmailJob($details))->onConnection('database');

            session()->flash('message', 'Email Enviado');

            return redirect()->to('/');
        } catch (\Throwable $th) {
            session()->flash('message', $th->getMessage());
        }
    }
}
