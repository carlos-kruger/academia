@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Avaliações</h2>

    <button type="button" class="btn btn-primary" id="btn_incluir">Incluir</button>

    <br />
    <br />

    <div class="row justify-content-center">
        <div class="col-12">
            <table id="grid_avaliacoes" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Instrutor</th>
                        <th scope="col">Data Avaliação</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal_incluir_avaliacao" tabindex="-1" role="dialog" aria-labelledby="modal_incluir_avaliacao" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_incluir_avaliacao_label">Incluir avaliação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_avaliacao" class="needs-validation" novalidate>
                        <input hidden id="codigo"/>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="aluno" class="col-form-label">Aluno:</label>
                                    <input type="text" class="form-control" id="aluno" required>
                                    <div class="invalid-feedback">
                                        Aluno é obrigatório.
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="aluno_nome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="aluno_nome" required>                         
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="altura" class="col-form-label">Altura:</label>
                                    <input type="text" class="form-control" id="altura" required>
                                    <div class="invalid-feedback">
                                        Altura é obrigatório.
                                    </div>                             
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peso" class="col-form-label">Peso:</label>
                                    <input type="text" class="form-control" id="peso" required>
                                    <div class="invalid-feedback">
                                        Peso é obrigatório.
                                    </div>                             
                                </div> 
                            </div>                            
                        </div>                                            
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_fechar"    class="btn btn-secondary">Fechar</button>
                    <button type="button" id="btn_confirmar" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_incluir_avaliacao" tabindex="-1" role="dialog" aria-labelledby="modal_incluir_avaliacao" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_incluir_avaliacao_label">Incluir avaliação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input hidden id="codigo_cliente"/>

                        <div class="form-group">
                            <label for="data" class="col-form-label">Data:</label>
                            <input type="date" class="form-control" id="data">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="peso" class="col-form-label">Peso:</label>
                            <input type="text" class="form-control" id="peso">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="altura" class="col-form-label">Altura:</label>
                            <input type="text" class="form-control" id="altura">
                        </div>                                            
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_fechar_avaliacao"    class="btn btn-secondary">Fechar</button>
                    <button type="button" id="btn_confirmar_avaliacao" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>    
</div>

<script src="js/avaliacao.js"></script>
@endsection
