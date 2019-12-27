<?php 
  include "header.php";
?>
<script src="https://cointic.com.mx/preveer/sistema/assets/js/jquery.min.js"></script>
<script type="text/javascript">
   window.onload=inicio;
    function inicio(){

        var idu = $("#idPonderador").val();
          $.ajax({
        url : "<?php echo site_url('CrudPonderaciones/obtenerDatos')?>/" + idu,
        type: "get",
        dataType: "JSON",
        success: function(data)
        {
           
            
        $("#nombrePonderador").val(data.nombrePonderador);
        $("#valorPonderador").val(data.valor);



              
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    $(function(){
  $("#form").on("submit", function(e){
    var url;
    $('#cargando').html('<img src="https://cointic.com.mx/preveer/sistema/Content/assets/images/loading.gif"/>');
    url= "<?php echo 'https://cointic.com.mx/preveer/sistema/index.php/CrudPonderaciones/modificarDatos/';?>";
    e.preventDefault();
    var f = $(this);
    var formData = new FormData(document.getElementById("form"));
    
    $.ajax({
                url: url,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                 processData: false
            })
                .done(function(res){


                    swal("HECHO", "Datos modificados.", "success")

                 
                },
                function(){
                    window.history.back();
                });

    });
 });
</script>

<section class="content">
<div class="container-fluid">
<div class="block-header">
                <a href="<?=site_url('CrudPonderaciones');?>">
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
                                
                            Modificar ponderador
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
                            <form method="post" action="" id="form" enctype="multipart/form-data">

                                <input type="hidden" id="idPonderador" name="idPonderador" value="<?=$idPonderador?>">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <h2 class="card-inside-title">Ingrese el nuevo nombre del ponderador </h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="nombrePonderador" name="nombrePonderador" placeholder="Nombre del ponderador" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="card-inside-title">Valor de la ponderación</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="phone" class="form-control" id="valorPonderador" name="valorPonderador" placeholder="Valor de la ponderación" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-4 col-md-offset-5">
                                            <div class="form-line">
                                                <input type="submit" class="btn bg-red waves-effect waves-light" value="Actualizar">
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
            
            
            <?php 
  include "footer.php";
?>