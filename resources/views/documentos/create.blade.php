<div class="modal fade" id="modal-doc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nuevo documento</h4>    
            </div>
            <div class="modal-body">
                <form action="{{ route('documentos.store') }}" method="POST">
                    
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="">folio</label>
                        <input type="text" class="form-control" name="folio" required>
                    </div>

                    <div class="form-group">
                        <label for="">descripcion</label>
                        <textarea class="form-control" rows="3" name="descripcion" required></textarea>
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
                        <input type="date" class="form-control"  name="fecha_doc">
                    </div>

                    <div class="form-group">
                            <label>adjunto</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-file"></i> Cargar
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="url">
                            </div>
                    </div>
                        {{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
                    </div> 
                </form>
        
                    
            </div>
        </div>
    </div>
</div>