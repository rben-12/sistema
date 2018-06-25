<div class="modal fade" id="modal-r">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nuevo resguardo</h4>    
            </div>
    
            <div class="modal-body">
                <form action="{{route('resguardos.store')}}" method="POST">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="">numero de resguardo</label>
                        <input type="text" class="form-control" name="n_resguardo" required>
                    </div>

                    <div class="form-group">
                        <label for="">resguardante</label>
                        <input type="text" class="form-control" name="resguardante" required>
                    </div>

                    <div class="form-group">
                        <label for="">puesto</label>
                        <input type="text" class="form-control" name="puesto" required>
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
                        <label for="">descripcion</label>
                        <textarea name="descripcion" rows="2" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">extension</label>
                        <input type="text" class="form-control" name="extencion">
                    </div>

                    <div class="form-group">
                        <label for="">asignar dispositivo</label>
                        <input type="text" class="form-control" name="articulo_id" placeholder="ingrese el id del dispositivo" required>
                    </div>

                   <div class="form-group">
                            <label>archivo</label>
                            <input type="file" class="form-control" name="archivo" enctype="multipart/form-data">
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