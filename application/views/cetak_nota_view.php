<!DOCTYPE html>
<html>
<head>
	<title>NOTA</title>
<link href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.addons.css" rel="stylesheet">
	<!-- Javascript -->
	<script src="<?php echo base_url(); ?>/assets/vendors/jqwery/jquery.min.js"></script>
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" >
</head>
<body>
	<div id="nota"></div>
	
	<script type="text/javascript">

		$("#nota").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/transaksi/get_detil_transaksi_by_id/<?php echo $this->uri->segment(3); ?>',  function(data){
			$("#nota").html(data.show_detil);

			window.print();
		});

	</script>

</body>
</html>