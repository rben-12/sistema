
<div class="modal fade" id="modal-a">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                    <h4>Agregar al inventario</h4>
                    
                </div>
                <div class="modal-body">
    
        <form action="{{route('articulos.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                <label for="">Categoria</label>
                    <select name="categoria_id" class="form-control" required>
                    @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{$c->categoria}}</option>
                    @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    <label for="">Descripción</label>
                    <input type="text" name='descripcion'  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Inventario interno</label>
                    <input type="text" name='inv_interno' class="form-control" required>
                </div>    
                <div class="form-group">
                    <label for="">Inventario externo</label>
                    <input type="text" name='inv_externo' class="form-control" required>
                </div>
                
                <div class="form-group">
                        <label for="">Numero de serie</label>
                        <input type="text" name='serie' class="form-control" required>
                    </div>
    
                <div class="form-group">
                    <label for="">Marca</label>
                    <select name="marca_id" class="form-control" required>
                        @foreach($marcas as $m)
                        <option value="{{$m->id}}">{{$m->marca}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                <label for="">Modelo</label>
                <input type="text" name='modelo' class="form-control" required>
                </div>
            
            
                <div class="form-group">
                        <label for="">Status</label>
                        <select name="status_id" class="form-control" required>
                            @foreach($statuses as $s)
                            <option value="{{$s->id}}">{{$s->status}}</option>
                            @endforeach
                        </select>
                </div>
            
            <div class="form-group">
                <label for="comment">Ubicación</label>
                <textarea class="form-control" name='ubicacion' rows="3" ></textarea>
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