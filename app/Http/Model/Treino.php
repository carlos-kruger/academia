<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\DB;

class Treino extends Model {

    protected $table = 'treinos';
    protected $fillable = array ('id', 'codigo_aluno', 'codigo_instrutor', 'status');
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function findAll() {
        return DB::table('treinos')
                        ->join('alunos', 'treinos.codigo_aluno', '=', 'alunos.id')
                        ->join('users', 'treinos.codigo_instrutor', '=', 'users.id')
                        ->select('treinos.*', 'alunos.nome as nome_aluno', 'users.name as nome_instrutor')
                        ->get();
    }

    public function buscaExercicios($id) {
        return DB::table('treinos_exercicios')
                        ->where('codigo_treino', '=', $id)
                        ->select('treinos_exercicios.*')
                        ->get();
    }    

    public function findById($id) {
        $treino = self::find($id);
        if (is_null($treino)){
            return false;
        }
        return $treino;
    }

    public function salvar() {
        $aInputs = Input::all();
        $treino = new Treino($aInputs);
        $treino->save();

        foreach($aInputs['exercicios'] as $exercicio) {
            $exercicio['codigo_treino'] = $treino->original['id'];
            $oExercicio = new TreinoExercicio($exercicio);
            $oExercicio->save();
        }

        return $treino;
    }

    public function atualizar($id) {
        $treino = self::find($id);
        if(is_null($treino)){
            return false;
        }
        $treino->fill(Input::all());
        $treino->save();
        return $treino;
    }

    public function deletar($id) {
        $treino = self::find($id);
        if(is_null($treino)){
            return false;
        }
        return $treino->delete();
    }

}