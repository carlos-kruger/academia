<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Treino;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TreinoController extends BaseController
{

    private $treino = null;

    public function __construct(Treino $treino){
        $this->treino = $treino;
    }

    public function findAll() {
        return response()->json($this->treino->findAll(), 200)
            ->header("Content-Type","application/json");
    }

    public function buscaExercicios($id) {
        return response()->json($this->treino->buscaExercicios($id), 200)
            ->header("Content-Type","application/json");
    }

    public function findById($id) {
        $treino = $this->treino->findById($id);
        if(!$treino){
            return response()->json(['response', 'Treino não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($treino, 200)
            ->header("Content-Type","application/json");
    }

    public function save() {
        return response()->json($this->treino->salvar(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizar($id) {
        $treino = $this->treino->atualizar($id);
        if(!$treino){
            return response()->json(['response', 'Treino não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($treino, 200)
            ->header("Content-Type","application/json");
    }

    public function delete($id) {
        $treino = $this->treino->deletar($id);
        if(!$treino){
            return response()->json(['response','Treino não encontrada.'], 400)
                ->header("Content-Type","application/json");
        }
        return response()->json($treino, 200)
            ->header("Content-Type","application/json");
    }

}
