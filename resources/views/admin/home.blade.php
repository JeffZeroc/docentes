@extends('layouts.app_admin')

@section('title','Docente')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

@endsection


@section('sidebar')
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion " id="accordionSidebar">
  <!-- Sidebar - Brand -->
  
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
      <div class="sidebar-brand-icon">
        <span>Administrador</span>
      </div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="/home">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
          <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
        </svg>
        <span>Inicio</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item " >
    <a class="nav-link collapsed" href="/home/docente" aria-expanded="true" aria-controls="collapseTwo">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      </svg>
      <span>Docente</span>
    </a> 
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="/home/periodo" aria-expanded="true" aria-controls="collapseTwo">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass" viewBox="0 0 16 16">
        <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2h-7z"/>
      </svg>
      <span>Periodos</span>
    </a> 
  </li>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="/informe" data-toggle="collapse" data-target="#informes"
          aria-expanded="true" aria-controls="informes">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-exe" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM2.575 15.202H.785v-1.073H2.47v-.606H.785v-1.025h1.79v-.648H0v3.999h2.575v-.647ZM6.31 11.85h-.893l-.823 1.439h-.036l-.832-1.439h-.931l1.227 1.983-1.239 2.016h.861l.853-1.415h.035l.85 1.415h.908l-1.254-1.992L6.31 11.85Zm1.025 3.352h1.79v.647H6.548V11.85h2.576v.648h-1.79v1.025h1.684v.606H7.334v1.073Z"/>
          </svg>
          <span>Informes</span>
      </a>
      <div id="informes" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#informes">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tipos:</h6>
              <a class="collapse-item" href="utilities-color.html">Informe periodo</a>
              <a class="collapse-item" href="utilities-border.html">Informe Docente</a>
              <a class="collapse-item" href="utilities-animation.html">Otro Informe </a> 
          </div>
      </div>
  </li>
  <!-- Sidebar Toggler (Sidebar)-->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul> 
@endsection
@section('content')
  
                  <!-- Page Heading -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Inicio</h1>
                    <p class="mb-4">En esta pagina se realizara un resumen de todo. . .un grafico por aqui. . .un texto por alla. y asi...</a>.</p>

                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte
                              </a>
                </div>



@endsection