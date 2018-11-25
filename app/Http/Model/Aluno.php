<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Aluno extends Model {

    protected $table = 'alunos';
    protected $fillable = array ('id', 'nome', 'email', 'celular', 'nascimento', 'sexo', 'status');
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function findAll() {
        return self::all();
    }

    public function findById($id) {
        $aluno = self::find($id);
        if (is_null($aluno)){
            return false;
        }
        return $aluno;
    }

    public function salvar() {
        $aluno = new Aluno(Input::all());
        $aluno->save();
        return $aluno;
    }

    public function atualizar($id) {
        $aluno = self::find($id);
        if(is_null($aluno)){
            return false;
        }
        $aluno->fill(Input::all());
        $aluno->save();
        return $aluno;
    }

    public function ativarInativar($id) {
        $inputs = Input::all();
        $aluno = self::find($id);
        if(is_null($aluno)){
            return false;
        }
        $aluno->status = $inputs['status'];
        $aluno->save();
        return $aluno;
    }

}