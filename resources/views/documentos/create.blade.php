<div class="modal fade" id="modal-doc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nuevo documento</h4>    
            </div>
            <div class="modal-body">
                <form action="{{route('documentos.store')}}" >
                    
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="">folio</label>
                        <input type="text" class="form-control" name="folio" required>
                    </div>

                    <div class="form-group">
                        <label for="">descripcion</label>
                        <textarea class="form-control" rows="3" name="descripcion"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">tipo del documento</label>
                        <select name="tipo_id" class="form-control" required>
                            @foreach($tipos as $t)
                            <option value="{{$t->id}}">{{$t->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">fecha del documento</label>
                        <input type="date" class="form-control"  name="fecha_docs">
                    </div>

                    <div class="form-group">
                            <label>adjunto</label>
                            <input type="file" class="form-control" name="url" enctype="multipart/form-data">
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