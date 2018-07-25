<div class="modal fade" id="modal-e">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nuevo encargado</h4>    
                </div>

            <div class="modal-body">
    
                <form action="{{route('encargados.store')}}" method="post">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Encargado</label>
                        <input type="text" class="form-control" name="encargado">
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