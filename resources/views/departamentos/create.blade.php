<div class="modal fade" id="modal-d">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                <h4>Agregar nuevo departamento</h4>    
                </div>

            <div class="modal-body">
    
                <form action="{{route('departamentos.store')}}" method="post">
                {{csrf_field()}}

                    <div class="form-group">
                        <label for="">departamento</label>
                        <input type="text" class="form-control" name="departamento">
                    </div>
                    <div class="form-group">
                        <label>vlan</label>
                        <input type="text" class="form-control" name="vlan"></input>
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