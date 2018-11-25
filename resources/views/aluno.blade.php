@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Alunos</h2>

    <button type="button" class="btn btn-primary" id="btn_incluir">Incluir</button>

    <br />
    <br />

    <div class="row justify-content-center">
        <div class="col-12">
            <table id="grid_alunos" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal_incluir_aluno" tabindex="-1" role="dialog" aria-labelledby="modal_incluir_aluno" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_incluir_aluno_label">Incluir aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_aluno" class="needs-validation" novalidate>
                        <input hidden id="codigo"/>

                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" required>
                            <div class="invalid-feedback">
                                Nome é obrigatório.
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">E-mail:</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                E-mail é obrigatório.
                            </div>                             
                        </div>                        
                        <div class="form-group">
                            <label for="celular" class="col-form-label">Celular:</label>
                            <input type="text" maxlength="15" class="form-control" id="celular" required>
                            <div class="invalid-feedback">
                                Celular é obrigatório.
                            </div>                             
                        </div>
                        <div class="form-group">
                            <label for="nascimento" class="col-form-label">Nascimento:</label>
                            <input type="date" class="form-control" id="nascimento" required>
                            <div class="invalid-feedback">
                                Nascimento é obrigatório.
                            </div>                             
                        </div>    
                        <div class="form-group">
                            <label for="sexo" class="col-form-label">Sexo:</label>
                            <select id="sexo" class="form-control">
                                <option value="1">Masculino</option>
                                <option value="2">Feminino</option>
                            </select>                          
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

<script src="js/aluno.js"></script>
@endsection
