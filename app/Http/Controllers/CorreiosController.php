<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

class CorreiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('correios');
    }

    public function consultar($cep = NULL)
    {
        $dados = Request::all();
        if ($dados !== []) {
            if ($dados['cep'] == "") {
                return view('correios', ['message' => 'Não é permitida consulta vazia.']);
            }
        }
        if (isset($dados["cep"])) {
            $cep = $dados["cep"];
        }

        $headers = array(
            "Content-Type: application/json"
        );

        $ch = curl_init("http://www.viacep.com.br/ws/{$cep}/json/");
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 540);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $returndata = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($returndata, 0, $header_size);
        $body = substr($returndata, $header_size);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);
        $json_str = json_decode($body, true);

        // Faz a mesma coisa que o curl
        // $json_file = file_get_contents("http://www.viacep.com.br/ws/{$cep}/json/");
        // $json_str = json_decode($json_file, true);

        if (isset($json_str['erro'])) {
            return view('correios', ['message' => 'CEP inválido.']);
        }
        return view('correios_resposta', [
            "cep" => $cep, 
            "logradouro" => $json_str["logradouro"],
            "complemento" => $json_str["complemento"],
            "bairro" => $json_str["bairro"],
            "localidade" => $json_str["localidade"],
            "uf" => $json_str["uf"],
            "unidade" => $json_str["unidade"],
            "ibge" => $json_str["ibge"],
            "gia" => $json_str["gia"]
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
