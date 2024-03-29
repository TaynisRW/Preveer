<?php
include "header.php";
?>
    <script src="https://cointic.com.mx/preveer/sistema/assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#formulario").on("submit", function(e){
                var url;
                $('#cargando').html('<img src="https://cointic.com.mx/preveer/sistema/Content/assets/images/loading.gif"/>');
                url= "<?php echo 'https://cointic.com.mx/preveer/sistema/index.php/CrudAcordeon/altaAcordeon/';?>";
                e.preventDefault();
                var f = $(this);
                // var formulario = $("#formulario").serialize();
                var formulario = new FormData(document.getElementById("formulario"));
                //alert(formulario);
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "html",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res)
                    {
                        //  alert(res);
                        swal({
                                title: "HECHO",
                                text: "El Acordeon se ha registrado exitosamente.",
                                type: "success",
                                ///showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Aceptar",
                                closeOnConfirm: false
                            },
                            function(){
                                window.location.assign("https://cointic.com.mx/preveer/sistema/index.php/CrudAcordeon")
                            });
                    }
                });

            });
        });


    </script>

    <section class="content">
        <div class="container-fuid">
            <div class="block-header">
                <a href="<?=site_url('CrudAcordeon');?>">
                    <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                        <i class="material-icons">arrow_back</i>
                    </button>
                </a>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>

                                Ingrese  los siguientes datos
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>

                        <div class="body">
                            <form method="post" action="" id="formulario" enctype="multipart/form-data" >
                                <div style="text-align: center" class= class="row ">
                                <div   class="col-md-4">
                                    <center><label >Nombre de Acordeon</label></center>
                                    <div  class="form-group">
                                        <div class="form-line">
                                            <input id="nombreAcordeon" name="nombreAcordeon" type="text" class="form-control"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float" style="margin-top: 13px;">
                                        <div class="form-line">
                                            <label for="tipoUser">¿Con Tabla de Registro?</label>
                                            <select id="tablaRegistro" name="tablaRegistro" style="width: 100%; border: none;" onChange="mostrarCantidadFotos(this)" required>
                                                <option value="">Seleccione </option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="divCantidadFotos" class="col-md-4" style="display: none;">
                                    <center><label>Cantidad de Fotos</label></center>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="cantidadFotos" name="cantidadFotos" type="number" class="form-control" min="0" value="0" required>
                                        </div>
                                    </div>
                                </div>


                                <div style="text-align: left;" class="row">
                                    <div class="col-sm-4 col-md-offset-5">
                                        <div class="form-line">
                                            <input type="submit" class="btn bg-red waves-effect waves-light" value="Aceptar">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

<script>
    function mostrarCantidadFotos(elemento)
    {
        if($(elemento).val()==1)
            $("#divCantidadFotos").show();
        else
        {
            $("#divCantidadFotos").hide();
            $("#cantidadFotos").val(0);
        }

    }
</script>

<?php
include "footer.php";
?>