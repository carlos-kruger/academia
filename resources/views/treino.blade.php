@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Treinos</h2>

    <button type="button" class="btn btn-primary" id="btn_incluir">Incluir</button>

    <br />
    <br />

    <div class="row justify-content-center">
        <div class="col-12">
            <table id="grid_treinos" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Instrutor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal_incluir_treino" tabindex="-1" role="dialog" aria-labelledby="modal_incluir_treino" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_incluir_treino_label">Incluir treino</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_treino" class="needs-validation" novalidate>
                        <input hidden id="codigo"/>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="aluno" class="col-form-label">Aluno:</label>
                                    <input type="text" class="form-control" id="aluno" required>
                                    <div class="invalid-feedback">
                                        Aluno é obrigatório.
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="aluno_nome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="aluno_nome" required>
                                </div>
                            </div>              
                        </div>                                                                                                 
                    </form>

                    <form id="form_exercicio">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exercicio" class="col-form-label">Exercício:</label>
                                    <input type="text" class="form-control" id="exercicio" required>
                                    <div class="invalid-feedback">
                                        Exercício é obrigatório.
                                    </div>                                    
                                </div>
                            </div>            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="series" class="col-form-label">Nº de séries:</label>
                                    <input type="text" class="form-control" id="series">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="repeticoes" class="col-form-label">Nº de repetições:</label>
                                    <input type="text" class="form-control" id="repeticoes">
                                </div>
                            </div>                                    
                        </div>
                        <div class="row">
                            <div class="col-md-2 offset-md-10">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" id="btn_adicionar">Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table id="grid_exercicios" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Exercício</th>
                                <th scope="col">Nº de séries</th>
                                <th scope="col">Nº de repetições</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_fechar"    class="btn btn-secondary">Fechar</button>
                    <button type="button" id="btn_confirmar" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/treino.js"></script>
@endsection
