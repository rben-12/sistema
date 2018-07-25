<div class="modal fade" id="modal-m">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nueva marca</h4>    
                </div>

            <div class="modal-body">
            {!! Form::open(['route'=>'marcas.store', 'method'=>'POST']) !!}
                <div class="form-group">
                    <label for="">Nueva marca</label>
                    <input  type="text" class="form-control" name="marca">
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            {!! Form::close() !!}   
                <!--</form>-->
            </div>
        </div>
    </div>
</div>