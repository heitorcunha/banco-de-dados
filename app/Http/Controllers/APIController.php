<?php

namespace App\Http\Controllers;
use App\Models\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{
   

    public function ListaClientes()
    {

      $clientes = Clientes::all();

      return response($clientes, 201)
      ->header('Content-Type', 'application/json');

    }

    public function ListaCliente($id)
    {

      $clientes = Clientes::find($id);

      return response($clientes, 201)
      ->header('Content-Type', 'application/json');

    }

    public function CadastraCliente(Request $data)
    {
      $clientes= Clientes::create([
        'nome' => $data->nome,
        'telefone' => $data->telefone,
        'datanascimento' => $data->datanascimento,
        'foto' => $data->foto,
        'email' => $data->email,
        'cidade' => $data->cidade,
        'endereco' => $data->endereco,
        'numero' => $data->numero,
        'complemento' => $data->complemento   

      ]);
      return response($clientes, 201)
      ->header('Content-Type', 'application/json');
    }

    public function DeleteCliente($id)
    {
      $clientes = Clientes::find($id);
      $clientes -> delete();
       
      return response($clientes, 201)
      ->header('Content-Type', 'application/json');
    }

    public function AlteraCliente(Request $data)
    {
      $clientes = Clientes::find($data->id);
      $clientes -> nome = $data->nome;
      $clientes -> telefone = $data->telefone;
      $clientes -> datanascimento = $data->datanascimento;
      $clientes -> foto = $data->foto;
      $clientes -> email = $data->email;
      $clientes -> endereco = $data->endereco;
      $clientes -> numero = $data->numero;
      $clientes -> complemento = $data->complemento;
      $clientes -> cidade = $data->cidade;
      $clientes->save();
       
      return response($clientes, 201)
      ->header('Content-Type', 'application/json');
    }
}
