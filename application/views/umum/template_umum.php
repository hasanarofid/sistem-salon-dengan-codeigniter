<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">




    <title>Pinandu LLDIKTI XI</title>



    <!-- // PLUGINS (css files) // -->

    <link href="<?= base_url(); ?>assets_front/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets_front/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="<?= base_url(); ?>assets_front/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets_front/css/main.css" rel="stylesheet">

   <link href="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>assets/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>



<body>



    <!--======================================== 

           Preloader

    ========================================-->

   

    <!--======================================== 

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



        <div class="container">

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="#brand">

                    <img src="<?= base_url(); ?>/assets/img/lldikti.png" alt="..." width="150" >


                </a>


            </div>

            <!-- End Header Navigation -->



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">
  <li ><a href="<?= base_url('site'); ?>">Home</a></li>
  <li ><a href="<?= base_url('umum'); ?>">Buat Tiket</a></li>

                  
                    <li ><a href="<?= base_url('umum/input_tiket'); ?>">Input Tiket</a></li>

                 

                  

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

    </nav>

  <?=$contents?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="<?= base_url(); ?>assets_front/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>assets_front/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="<?= base_url(); ?>assets_front/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="<?= base_url(); ?>assets_front/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="<?= base_url(); ?>assets_front/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="<?= base_url(); ?>assets_front/js/main.js"></script>
        <script src="<?= base_url();?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>/assets/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url();?>/assets/select2/js/select2.full.min.js"></script>
    <script>
  $(function () {
    
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
    </script>
     <script>
        

         function copy() {
             var copyText = document.getElementById("nomor_tiket");

             copyText.select();
             copyText.setSelectionRange(0, 99999); /* For mobile devices */

            // ini kada mau bila kada https
            //  navigator.clipboard.writeText(copyText.value);

             copyToClipboard(copyText.value)
                 .then(() => {
                     Toast.fire({
                         icon: 'success',
                         title: '"' +copyText.value + '" sudah dicopy'
                     })
                 })
                 .catch(() => {
                     Toast.fire({
                         icon: 'danger',
                         title: 'gagal dicopy/disalin'
                     })
                 });

             Toast.fire({
                 icon: 'success',
                 title: copyText.value + ' sudah dicopy/disalin'
             })
         }

         function copyToClipboard(textToCopy) {
             // navigator clipboard api needs a secure context (https)
             if (navigator.clipboard && window.isSecureContext) {
                 // navigator clipboard api method'
                 return navigator.clipboard.writeText(textToCopy);
             } else {
                 // text area method
                 let textArea = document.createElement("textarea");
                 textArea.value = textToCopy;
                 // make the textarea out of viewport
                 textArea.style.position = "fixed";
                 textArea.style.left = "-999999px";
                 textArea.style.top = "-999999px";
                 document.body.appendChild(textArea);
                 textArea.focus();
                 textArea.select();
                 return new Promise((res, rej) => {
                     // here the magic happens
                     document.execCommand('copy') ? res() : rej();
                     textArea.remove();
                 });
             }
         }
     </script>
<script type="text/javascript">


<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('delete')){  ?>
    toastr.error("<?php echo $this->session->flashdata('delete'); ?>");
<?php }else if($this->session->flashdata('update')){  ?>
    toastr.info("<?php echo $this->session->flashdata('update'); ?>");
<?php } ?>


</script>
</body>



</html>