@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                
              </ol>
          
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
          
                <div class="item active">
                  <img src="{{ asset('/img/CiscoMT.jpg') }}" alt="CiscoMT" width="600" height="345" >
                  <div class="carousel-caption">
                    <h3>Cisco</h3>
                    <p>Cisco System.</p>
                  </div>
                </div>
          
                <div class="item">
                  <img src="{{ asset('/img/CiscoNET.jpg') }}" alt="Cisco" width="600" height="345" >
                  <div class="carousel-caption">
                    <h3>Cisco</h3>
                    <p>Cisco System.</p>
                  </div>
                </div>
              
                <div class="item">
                  <img src="{{ asset('/img/3CXX.jpg') }}" alt="3CX" width="600" height="345" >
                  <div class="carousel-caption">
                    <h3>3CX</h3>
                    <p>3CX Softphone.</p>
                  </div>
                </div>
            
              </div>
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <br>
          

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary tc">
                <div class="panel-heading"><strong>HOME</strong></div>

                <div class="panel-body">
                <p>
                    usted tiene:
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        <div>Acceso como administrador</div>
                    @else
                        <div>Acceso usuario</div>
                    @endif
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
