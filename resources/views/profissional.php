@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Profissionais</h2>

    <button type="button" class="btn btn-primary" id="btn_incluir">Incluir</button>

    <br />
    <br />

    <div class="row justify-content-center">
        <div class="col-12">
            <table id="grid_profissionais" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Última atualização</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal_incluir_profissional" tabindex="-1" role="dialog" aria-labelledby="modal_incluir_profissional" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_incluir_profissional_label">Incluir profissional</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input hidden id="codigo"/>

                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">E-mail:</label>
                            <input type="text" class="form-control" id="email">
                        </div>                        
                        <div class="form-group">
                            <label for="celular" class="col-form-label">Celular:</label>
                            <input type="text" class="form-control" id="celular">
                        </div>
                        <div class="form-group">
                            <label for="senha" class="col-form-label">Senha:</label>
                            <input type="text" class="form-control" id="senha">
                        </div>
                        <div class="form-group">
                            <label for="confirmar_senha" class="col-form-label">Confirmar senha:</label>
                            <input type="text" class="form-control" id="confirmar_senha">
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
</div>

<script src="js/profissional.js"></script>
@endsection
