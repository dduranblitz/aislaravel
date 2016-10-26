<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/fullcalendar.css')!!}

    



</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Panel de administracion</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!!Auth::user()->name!!}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      <li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
               
               
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios Registrados</a>
                                </li>
                            </ul>
                        </li>
                  
                         <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/tarea/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/tarea')!!}"><i class='fa fa-list-ol fa-fw'></i> Tareas Registradas</a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Aprobar-Rechazar-Finalizar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="{!!URL::to('/tarea/cambiarEstadoTarea')!!}"><i class='fa fa-list-ol fa-fw'></i>Cambiar Estado Tarea</a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw"></i> Grupos de Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/grupoTarea/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/grupoTarea')!!}"><i class='fa fa-list-ol fa-fw'></i>Grupos Registrados</a>
                                </li>
                                  <li>
                                    <a href="{!!URL::to('/integrantesGrupo')!!}"><i class='fa fa-user fa-fw'></i>Gestionar Participantes</a>
                                </li>
                            </ul>
                        </li> 
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i>Avances y Seguimientos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/seguimientoTarea/create')!!}"><i class='fa fa-plus fa-fw'></i>Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/seguimientoTarea')!!}"><i class='fa fa-signal fa-fw'></i>Registrados</a>
                                </li>
                            </ul>
                        </li> 
                         <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Aplazamiento De Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/aplazamientoTarea/create')!!}"><i class='fa fa-plus fa-fw'></i>Agregar Aplazamiento</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/aplazamientoTarea')!!}"><i class='fa fa-signal fa-fw'></i>Aplazamientos Registrados</a>
                                </li>
                            </ul>
                        </li> 
                         <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Calendario De Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/calendarioTareas')!!}"><i class='fa fa-signal fa-fw'></i> Calendario Registrado</a>
                                </li>
                            </ul>
                        </li> 
                       


                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    


   
    {!!Html::script('js/jquery.min.js')!!} 
    {!!Html::script('js/moment.min.js')!!}
    {!!Html::script('js/fullcalendar.js')!!}
    {!!Html::script('js/funciones.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>