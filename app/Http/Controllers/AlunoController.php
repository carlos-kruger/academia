<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Aluno;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AlunoController extends BaseController
{

    private $aluno = null;

    public function __construct(Aluno $aluno){
        $this->aluno = $aluno;
    }

    public function findAll() {
        return response()->json($this->aluno->findAll(), 200)
            ->header("Content-Type","application/json");
    }

    public function findById($id) {
        $aluno = $this->aluno->findById($id);
        if(!$aluno){
            return response()->json(['response', 'Aluno não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($aluno, 200)
            ->header("Content-Type","application/json");
    }

    public function save() {
        return response()->json($this->aluno->salvar(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizar($id) {
        $aluno = $this->aluno->atualizar($id);
        if(!$aluno){
            return response()->json(['response', 'Aluno não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($aluno, 200)
            ->header("Content-Type","application/json");
    }

    public function ativarInativar($id) {
        $aluno = $this->aluno->ativarInativar($id);
        if(!$aluno){
            return response()->json(['response', 'Aluno não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($aluno, 200)
            ->header("Content-Type","application/json");
    }

}
