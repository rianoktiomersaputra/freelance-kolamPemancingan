<?php
require_once "config/config.php";
require_once "assets/libs/vendor/autoload.php";
require_once "assets/libs/Carbon/autoload.php";

if(!isset($_SESSION['rmeg'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
	
	<title>Rekam Medis Gigi</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/teeth.png')?>">	
	<link href="<?=base_url('assets/libs/DataTables/datatables.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/now-ui-kit.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/now-ui-dashboard.css?v=1.0.1')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/select2.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/js/jquery-ui-1.12.1/jquery-ui.css')?>"/>
	<link href="<?=base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" />
	
    <script src="<?=base_url('assets/ckeditor/ckeditor.js')?>" ></script>
	<script src="<?=base_url('assets/js/core/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/core/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/myscript.js')?>"></script>
	<script src="<?=base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
	<script src="<?=base_url('assets/js/now-ui-dashboard.js?v=1.0.1')?>"></script>
	<script src="<?=base_url('assets/libs/DataTables/datatables.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.multifield.js')?>"></script>
	<script src="<?=base_url('assets/js/select2.min.js')?>"></script>
	<script src="<?=base_url('assets/js/printThis.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery-ui-1.12.1/jquery-ui.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery-ui-1.12.1/jquery-ui.css')?>"></script>
    <script src="<?=base_url('assets/js/sweetalert.min.js')?>"></script>

	<script>

    $.extend( true, $.fn.dataTable.defaults, {
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data yang ditemukan",
                "infoFiltered": "(mencari dari _MAX_ total data)",
                "search":         "Pencarian:",
                "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"
                },
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
    } );

    $(document).ready( function () {
        $('#tabel_pasien').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [2,4,5,7,8,9,10,11,12,13,14,15]
                },
                {
                    "searchable" : false,
                    "targets": [0]
                },
                {
                    "orderable" : false,
                    "targets" : [1]
                }
            ],
            "order": [0, "asc"],
            "scrollY": 400,
            "scrollX": true,
            "scrollCollapse": true,
        });
        $('#tabel_pasien1').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,4,5,7,8,9,10]
                },
                {
                    "searchable" : false,
                    "targets": [0]
                }
            ],
            "order": [0, "asc"],
            "scrollY": 400,
            "scrollX": true,
            "scrollCollapse": true,
        });
        $('#tabel_periksa').DataTable({
            columnDefs: [
                {
                    "orderable" : false,
                    "targets": [0,1,2,3,4,5,6,7]
                }
            ]
        });
        $('#tabel_pegawai').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,6]
                },
                {
                    "searchable" : false,
                    "targets": [0]
                }
            ],
            "order": [0, "asc"]
        });
        $('#tabel_pegawai1').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "targets": [0]
                }
            ],
        });
        $('#tabel_keadaangigi').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,4,5]
                }
            ]
        });
        $('#tabel_perawatangigi').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,4,5,6]
                }
            ]
        });
        
        $('#tabel_obatbahan').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,4,5,6]
                }
            ]
        });
        $('#tabel_detailrekammedis').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,6,7,8,9,10,11,12]
                },
                {
                    "searchable" : false,
                    "targets": [0]
                }
            ]
        });
        $('#tabel_tunggu').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,5]
                }
                ,
                {
                    "searchable" : false,
                    "targets": [4]
                }
            ]
        });
        $('#tabel_tunggu1').DataTable({
            columnDefs: [
                {
                    "orderable" : false,
                    "targets": [0,2]
                },
                {
                    "orderable" : false,
                    "searchable" : false,
                    "targets": [3]
                }
            ]
        });
        $('#tabel_tunggu2').DataTable({
            columnDefs: [
                {
                    "orderable" : false,
                    "searchable" : false,
                    "targets": [0,4]
                },
                {
                    "searchable" : false,
                    "targets": [2,3]
                }
            ]
        });
        $('#tabelpasientunggu').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,4]
                }
            ]
        });
        $('#tabel_detailpasien').DataTable({
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable": false,
                    "targets": [3,5,6]
                }
            ]
        });
    });
</script>

<script>
$(document).ready(function(){
    $("#og18").click(function(){
        $("#mg18").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og17").click(function(){
        $("#mg17").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og16").click(function(){
        $("#mg16").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og15").click(function(){
        $("#mg15").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og14").click(function(){
        $("#mg14").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og13").click(function(){
        $("#mg13").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og12").click(function(){
        $("#mg12").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og11").click(function(){
        $("#mg11").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og21").click(function(){
        $("#mg21").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og22").click(function(){
        $("#mg22").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og23").click(function(){
        $("#mg23").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og24").click(function(){
        $("#mg24").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og25").click(function(){
        $("#mg25").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og26").click(function(){
        $("#mg26").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og27").click(function(){
        $("#mg27").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og28").click(function(){
        $("#mg28").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og55").click(function(){
        $("#mg55").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og54").click(function(){
        $("#mg54").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og53").click(function(){
        $("#mg53").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og52").click(function(){
        $("#mg52").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og51").click(function(){
        $("#mg51").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og61").click(function(){
        $("#mg61").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og62").click(function(){
        $("#mg62").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og63").click(function(){
        $("#mg63").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og64").click(function(){
        $("#mg64").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og65").click(function(){
        $("#mg65").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og85").click(function(){
        $("#mg85").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og84").click(function(){
        $("#mg84").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og83").click(function(){
        $("#mg83").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og82").click(function(){
        $("#mg82").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og81").click(function(){
        $("#mg81").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og71").click(function(){
        $("#mg71").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og72").click(function(){
        $("#mg72").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og73").click(function(){
        $("#mg73").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og74").click(function(){
        $("#mg74").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og75").click(function(){
        $("#mg75").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og48").click(function(){
        $("#mg48").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og47").click(function(){
        $("#mg47").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og46").click(function(){
        $("#mg46").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og45").click(function(){
        $("#mg45").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og44").click(function(){
        $("#mg44").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og43").click(function(){
        $("#mg43").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og42").click(function(){
        $("#mg42").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og41").click(function(){
        $("#mg41").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og31").click(function(){
        $("#mg31").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og32").click(function(){
        $("#mg32").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og33").click(function(){
        $("#mg33").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og34").click(function(){
        $("#mg34").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og35").click(function(){
        $("#mg35").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og36").click(function(){
        $("#mg36").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og37").click(function(){
        $("#mg37").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#og38").click(function(){
        $("#mg38").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#detail").click(function(){
        $("#bukadetail").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#a").click(function(){
        $("#b").modal();
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
          placeholder: 'Pilih Penyakit'
        });
    });
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
$(document).ready(function(){
    load_data();
    function load_data(query)
    {
        $.ajax({
            url:"fetch.php",
            method:"post",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
    
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();            
        }
    });
});
</script>

</head>
