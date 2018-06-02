<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['method' => 'delete', 'class' => 'form', 'id' => 'deleteCakeForm']) }}
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Удаление тортика</h4>
                </div>
                <div class="modal-body">
                    Ну зачем ты хочешь удалить этот прекрасный тортик? :(
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Удалить</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>