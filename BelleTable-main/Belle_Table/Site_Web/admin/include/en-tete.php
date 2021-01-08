 <meta charset="utf-8">
<!-- pour avoir un site responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- pour mettre des icones  -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
<!-- pour la description du site -->
<meta name="description" content="">
<!-- pour mettre les mots clés -->
<meta name= "keywords" content= "">
<!-- pour IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!-- pour utiliser jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Bootstrap JS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Pour activer le bouton afficher/enlever la navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<!-- CSS !-->
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        $('.menuclick').on('click', function() {
          $('.menuclick').toggleClass('active');
          $('.menuclick').toggleClass('dropright');
          <?php if(isset($class)): ?>
            $('<?php echo $class ?>').toggleClass('desactive');
          <?php endif; ?>
        }); 
    });
</script>

<?php @session_start(); $bdd = mysqli_connect ("localhost", "root", "","belle_table"); ?>

<style type="text/css">.desactive {background-color: inherit;}</style> <!-- permet de enlever la couleur de la page active lorsqu'on active un sous menu !-->