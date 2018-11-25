<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\DB;

class Avaliacao extends Model {

    protected $table = 'avaliacoes';
    protected $fillable = array ('id', 'codigo_aluno', 'codigo_instrutor', 'altura', 'peso');
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function findAll() {
        return DB::table('avaliacoes')
                        ->join('alunos', 'avaliacoes.codigo_aluno', '=', 'alunos.id')
                        ->join('users', 'avaliacoes.codigo_instrutor', '=', 'users.id')
                        ->select('avaliacoes.*', 'alunos.nome as nome_aluno', 'users.name as nome_instrutor')
                        ->get();
    }

    public function findById($id) {

        if (is_null($avaliacao)){
            return false;
        }
        return $avaliacao;
    }

    public function salvar() {
        $avaliacao = new Avaliacao(Input::all());
        $avaliacao->save();
        return $avaliacao;
    }

    public function atualizar($id) {
        $avaliacao = self::find($id);
        if(is_null($avaliacao)){
            return false;
        }
        $avaliacao->fill(Input::all());
        $avaliacao->save();
        return $avaliacao;
    }

    public function deletar($id) {
        $avaliacao = self::find($id);
        if(is_null($avaliacao)){
            return false;
        }
        return $avaliacao->delete();
    }

}