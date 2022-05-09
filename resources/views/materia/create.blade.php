@php
    $valor = 0
@endphp
@extends('layouts.app_admin')

@section('title','Crear Asignaturas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Asignatura</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('materias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Carrera</label>
                                                <select name="carrera_id" id="carrera_id" class="form-select form-control @error('carrera_id') is-invalid @enderror">
                                                    <option value="" >Seleccione carrera</option>                   
                                                    @foreach ( $carreras as $carrera)
                                                    <option value="{{$carrera->id}}" {{ (collect(old('carrera_id'))->contains($carrera->id)) ? 'selected':'' }} >{{ $carrera->nombre}}</option>                   
                                                    @endforeach
                                                </select>
                                                @error('carrera_id')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Nivel</label>
                                                <select name="nivel" id="nivel" class="form-select form-control @error('nivel') is-invalid @enderror">
                                                                                                       
                                                </select>
                                                @error('nivel')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Nombre</label>
                                                <input id="nombre" type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{  old('nombre') }}" placeholder="Nombre Asignatura" autofocus>
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Código</label>
                                                <input id="codigo" type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{  old('codigo') }}" placeholder="Código Asignatura" autofocus>
                                                @error('codigo')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Horas Autonomas</label>
                                                <input id="hora_a" type="text" name="hora_a" class="form-control @error('hora_a') is-invalid @enderror" value="{{  old('hora_a') }}" placeholder="1-70" autofocus>
                                                @error('hora_a')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Horas Presenciales</label>
                                                <input id="hora_p" type="text" name="hora_p" class="form-control @error('hora_p') is-invalid @enderror" value="{{  old('hora_p') }}" placeholder="1-70" autofocus>
                                                @error('hora_p')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Horas Docente</label>
                                                <input id="hora_d" type="text" name="hora_d" class="form-control @error('hora_d') is-invalid @enderror" value="{{  old('hora_d') }}" placeholder="1-70" autofocus>
                                                @error('hora_d')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <br>
                                <div class="row box-footer mt20">
                                    <div class="col-md-12">
                                        <a href="/home/materias" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                const $select = document.querySelector("#carrera_id");
                                const $select2 = document.querySelector("#nivel");
                                
                                const opcionCambiada = () => {
                                    for (let i = $select2.options.length; i >= 0; i--) {
                                        $select2.remove(i);
                                    }
                                    // var doctors = document.getElementById("carrera_id");
                                    // console.log(doctors.value);
                                    $.get("/home/materias/create/"+event.target.value+"",function(response,select){
                                        $valor = response.duracion;
                                        
                                        for(i=1; i<=$valor; i++){
                                            const option = document.createElement('option');
                                            option.value = i;
                                            option.text = i;
                                            
                                            $select2.appendChild(option);
                                            // const option = Option();
                                            // $select2.appendChild(option);
                                            //$('#nivel').append("option value='"+i+"'>"+i+"</option>");
                                            //console.log(option);
                                            // const option = document.createElement('option');
                                            // option.value = i;
                                            // option.text = i;
                                            // $select2.appendChild(option);
                                            // "@if (old('nivel') == '{{i}}' ) {{ 'selected' }} @endif"
                                        }
                                        
                                    });
                                    
                                };

                                $select.addEventListener("change", opcionCambiada);

                                
                                // function cambio(select){
                                //     $dato = select.value;
                                //     $.get("/home/materias/create/"+event.target.value+"",function(response,dato){
                                //         $("#nivel").empty();
                                //         for(i=0; i<response.duracion; i++){
                                //             $("#nivel").append("option value='"+i+"'>"+i+"</option>");
                                //         }
                                //     });
                                // };
                                // function cambio(select){
                                //     $niveles = $carreras->find(select.value);
                                //     $niveles_c= $niveles->duracion;
                                   
                                // } 
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
