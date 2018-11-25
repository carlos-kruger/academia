<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Avaliacao;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AvaliacaoController extends BaseController
{

    private $avaliacao = null;

    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
    }

    public function findAll() {
        return response()->json($this->avaliacao->findAll(), 200)
            ->header("Content-Type","application/json");
    }

    public function findById($id) {
        $avaliacao = $this->avaliacao->findById($id);
        if(!$avaliacao){
            return response()->json(['response', 'Avaliação não encontrada.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($avaliacao, 200)
            ->header("Content-Type","application/json");
    }

    public function save() {
        return response()->json($this->avaliacao->salvar(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizar($id) {
        $avaliacao = $this->avaliacao->atualizar($id);
        if(!$avaliacao){
            return response()->json(['response', 'Avaliação não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($avaliacao, 200)
            ->header("Content-Type","application/json");
    }

    public function delete($id) {
        $avaliacao = $this->avaliacao->deletar($id);
        if(!$avaliacao){
            return response()->json(['response','Avaliação não encontrada.'], 400)
                ->header("Content-Type","application/json");
        }
        return response()->json($avaliacao, 200)
            ->header("Content-Type","application/json");
    }

}
