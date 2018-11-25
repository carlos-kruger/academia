<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\DB;

class TreinoExercicio extends Model {

    protected $table = 'treinos_exercicios';
    protected $fillable = array ('id', 'codigo_treino', 'exercicio', 'series', 'repeticoes');
    protected $primaryKey = 'id';
    public $timestamps = true;

    function deleteExerciciosFromTreino($idTreino) {
        return DB::table('treinos_exercicios')->where('codigo_treino', '=', $idTreino)->delete();
    }

}