<?php
include "header.php";
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- DataTable -->
    <link href="https://cointic.com.mx/preveer/sistema/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cointic.com.mx/preveer/sistema/assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">



    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php $tipo=$this->session->userdata('tipoUser');
                if($tipo!='' && $_SESSION['idusuariobase'] != '')
                {
                    if($tipo == 1){
                        echo "<a href='".site_url('Catalogos')."'>
                        <button type='button' class='btn btn-default btn-circle-lg waves-effect waves-circle waves-float'>
                            <i class='material-icons'>arrow_back</i>
                        </button>
                        </a>";
                    } elseif($tipo == 2){
                        echo "<a href='".site_url('menus')."'>
                        <button type='button' class='btn btn-default btn-circle-lg waves-effect waves-circle waves-float'>
                            <i class='material-icons'>arrow_back</i>
                        </button>
                        </a>";
                    }
                }

                ?>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ponderadores de bitacoras registrados
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">format_list_numbered</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="https://cointic.com.mx/preveer/sistema/index.php/CrudBitacoraPonderador/formAltaBitacoraPonderador">Registrar Ponderador</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover" id="tabla-bitacora">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conte=1;
                                foreach ($listBitacoraPonderador as $row) {
                                    $idBitacoraPonderador=$row["idBitacoraPonderador"];
                                    $NombreBitacoraPonderador=$row["texto"];

                                    echo "
                                            <tr>
                                                <td>$conte</td>
                                                <td>$NombreBitacoraPonderador</td>
                                                <td>
                                                    <a href='https://cointic.com.mx/preveer/sistema/index.php/CrudBitacoraPonderador/formEditarBitacoraPonderador/$idBitacoraPonderador'><i class='fa fa-pencil-square-o'></i></a>
                                                </td>
                                                <td><a href='#' onclick='confirmaDeleteBitacoraPonderador($idBitacoraPonderador);'><i class='fa fa-trash'></i></a></td>
                                            </tr>";
                                    $conte++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function confirmaDeleteBitacoraPonderador(id)
        {
            //alert ("id"+id);
            swal({
                    title: "Aviso",
                    text: "¿Desea borrar este cliente?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function(){
                    location.href="https://cointic.com.mx/preveer/sistema/index.php/CrudBitacoraPonderador/deleteBitacoraPonderador/"+id;
                });

        }
    </script>
    <script type="text/javascript">
        window.onload=inicio;
        function inicio()
        {
            $('#tabla-bitacora').dataTable();
        }
    </script>

<?php
include "footer.php";
?>