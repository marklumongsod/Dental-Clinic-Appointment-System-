<?php
session_start(); 
if(session_destroy()){ ?>
	<script type="text/javascript">
	
	</script>
<?php
header("location: ../index_admin.php");
}
?>