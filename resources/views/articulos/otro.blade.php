<div class="login-page">
        <div class="form">
          <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form>
          <form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
          </form>
        </div>
      </div>

      <a href="{{route('articulos.destroy', $a->id)}}" class="destroy btn btn-danger btn-xs"></a>
      
      {!! Form::model($marcas, ['route' => ['marcas.update', $marcas->id,'_method'=>'PUT']]) !!}
      <div class="form-group">
          {!! Form::label('marca', 'nueva marca') !!}
          {!! Form::text('marca', $marcas->marca, ['class'=>'form-control', 'required']) !!}
      </div>
      <div class="form-group">
          {!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
      </div>
  {!! Form::close() !!}


---
{{Form::open(['route'=>'articulos.index', 'method'=>'GET', 'class'=>'form-inline pull-right'])}}
      
      {{Form::close()}}
  <form name="form" class="navbar-form navbar-right" role="search" action="resultados.php" method="get">
        <div class="form-group">
         <input type="text" class="form-control" name="s" placeholder="Buscar">
        </div>
         <input type="submit" value="Buscar" class="btn btn-default"></input>
      </form> 
      <div class="col-sm-8">
        <h2> 
            Editar 
            <a href="{{route('articulos.index')}}" class="btn btn-primary pull-right">listado</a>
        </h2>
        form
        {!! Form::model($a, ['route' => ['articulos.update', $a->id,'method'=>'PUT']]) !!}
    
            @include('articulos.partials.create')
    
        {!! Form::close() !!}
    </div>
    

<!--<label for="">categoria</label>-->
                        <!--<select name="categoria_id" class="form-control" required>-->
                                @foreach($categorias as $c)
                                <option value="{{$c->id}}">{{$c->categoria}}</option>
                                @endforeach
                            </select>
                            <form action="{{route('marcas.store')}}" method="post">
                                {{csrf_field()}}
                
                                    <div class="form-group">
                                        <label for="">Nueva marca</label>
                                        <input type="text" class="form-control" name="marca">
                                    </div>
                                        
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
                                    </div>




<div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                    <h4>Agregar al inventario</h4>
                    {{csrf_field()}}
                </div>
                <div class="modal-body">
    
        <form action="{{route('articulos.store')}}" method="post">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="text" name='cantidad'  class="form-control" required>
                    </div>
                <div class="form-group">
                    <label for="">Descripción</label>
                    <input type="text" name='descripcion'  class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Numero de serie</label>
                        <input type="text" name='serie' class="form-control" required>
                    </div>
    
                    <div class="form-group">
                            <label for="">Marca</label>
                            <input type="text" name='marca' class="form-control" required>
                        </div>
    
                <div class="form-group">
                <label for="">Modelo</label>
                <input type="text" name='modelo' class="form-control" required>
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
                        <label for="">Status</label>
                        <select class="form-control"  name="status" required>
                                <option>Seleccione:</option>
                                <option>Revisado</option>
                                <option>No Revisado</option>
                                <option>En Stock</option>
                                <option>Prestamo</option> 
                                <option>Alta</option>
                                <option>Baja</option>
                              </select>
                        </div>
            <div class="form-group">
                    <label for="">Ubicación</label>
                    <input type="text" name='ubicacion' class="form-control" required>
            </div>
            <div class="form-group">
            <label for="">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-control">
                    @foreach($departamentos as $d)
                    <option value="{{$d->id}}">{{$d->departamento}}</option>
                    @endforeach
            </select>
            </div>
            
            </form>
        </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
            </div>
        </div>
    </div>