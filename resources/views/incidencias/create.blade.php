<div class="modal fade" id="modal-i">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar</h4>    
                </div>

            <div class="modal-body">
    
                <form action="{{route('incidencias.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="">asunto</label>
                        <select name="asunto_id" class="form-control" required>
                        @foreach($asuntos as $asu)
                        <option value="{{$asu->id}}">{{$asu->asunto}}</option>
                        @endforeach
                        </select> 
                    </div>

                <div class="form-group">
                    <label for="">descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="form-group">
                    <label for="">encargado</label>
                        <select name="encargado_id" class="form-control" required>
                        @foreach($encargados as $e)
                        <option value="{{$e->id}}">{{$e->encargado}}</option>
                        @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="">departamento</label>
                            <select name="departamento_id" class="form-control" required>
                            @foreach($departamentos as $d)
                            <option value="{{$d->id}}">{{$d->departamento}}</option>
                            @endforeach
                            </select> 
                    </div>
                    <div class="form-group">
                        <label for="">solución</label>
                        <input type="text" class="form-control" name="solucion">
                    </div>
                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>