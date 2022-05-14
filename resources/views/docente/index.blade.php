@extends('layouts.app_admin')

@section('title','Docentes')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Docentes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('docentes.create') }}" 
                                class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Docente') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                                <thead class="thead">
                                    <tr align="center">                                        
										<th width="280" >Nombres</th>
										<th width="100">Cedula</th>
										<th width="260">Correo Institucional</th>
										<th width="100">Género</th>
										<th >Estado</th>
                                        <th  width="180" ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            
											<td>{{ $docente->nombres }} {{$docente->apellidos}}</td>
                                            
											<td>{{ $docente->cedula }}</td>
											<td>{{ $docente->correo_institucional }}</td>
											<td>{{ $docente->sexo }}</td>
											@if ($docente->estado=='Activo')
                                            <td style="background-color:#00ff4c">{{ $docente->estado }}</td>
                                            @else
                                            <td style="background-color:#FF0000">{{ $docente->estado }}</td>
                                            @endif

                                            <td align="center">
                                                <form action="{{ route('docentes.destroy',$docente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('docentes.show',$docente->id) }}">
                                                        <i class="fa-regular fa-file-pdf"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('docentes.edit',$docente->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                    @if ( Auth::user()->tipo == 'Colaborador')
                                                        disabled
                                                    @endif onclick="return confirm('¿Estas seguro de eliminar el registro?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                </div>
                {!! $docentes->links() !!}
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src=""></script>
@endsection
