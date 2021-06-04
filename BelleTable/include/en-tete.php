<?php include('bdd.php'); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.compte').click(function() {
      $('.sous-menu').toggleClass('visible');
    });
  });
 </script>

<style type="text/css"> 
	.sous-menu {display: none; z-index: 999; position: relative; left: 12px;} 
	.visible {display: flex; justify-content: flex-end;} 
	.sous-menu li {padding: 7px 0; margin-left: 10px; text-align: left;}
	.sous-menu li:hover {text-align: right;}
	.ulsm {background: #ff7a00; display: flex; flex-direction: column; border-radius: 12px;}
	.ulsm li a {color: white;}
</style>
