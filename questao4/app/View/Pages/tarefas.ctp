<div class="row">
    <div class="col s12">
            <h4 class="header">Tarefas</h4>
            <br>
            <div>Clique e arraste a tarefa para ordenar a prioridade</div>
            <div class="clearfix"></div>
            <div id="list">
                <div id="response" class="toast"></div>
                <div class="clearfix"></div>
                <ol class="collection" id="lista-tarefas">
                    <li class="collection-item">
                        <span class="titulo">Tarefa 1</span>
                        <span class="descricao">Descricao da tarefa</span>
                        <a href="#!" class="secondary-content"><i class="material-icons">done</i></a>
                        <a href="#!" class="secondary-content"><i class="material-icons">edit</i></a>
                    </li>
                </ol>
            </div>
    </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h5>Cadastrar Tarefa</h5>
        <hr><br>
        <form class="col s12" accept-charset="utf-8">
        <input type="hidden" name="data[Tarefa][id]" id="TarefaId" />
        <div class="row">
                <div class="input-field col l3 s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <input name="data[Tarefa][titulo]" id="TarefaTitulo" type="text" class="validate" length="30" maxlength="30">
                        <label for="TarefaTitulo">Título</label>
                </div>
                <div class="input-field col l7 s12">
                        <i class="material-icons prefix">textsms</i>
                        <input  name="data[Tarefa][descricao]" id="TarefaDescricao" type="text" class="validate" length="100" maxlength="100">
                        <label for="TarefaDescricao">Descrição</label>
                </div>
                <div class="input-field col l2 s12 center-align">
                        <button class="btn waves-effect waves-light" name="action" id="TarefaGravar">Gravar
                                <i class="material-icons right">save</i>
                        </button>
                </div>
        </div>
        </form>
    </div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light" href="#" id="TarefaNovo">
        <i class="large material-icons">add</i>
    </a>
</div>