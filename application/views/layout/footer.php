
    <!-- Footer Start -->
    <div class="container-fluid">
    	<div class="bg-transparant rounded-top p-1">
    		<div class=" text-left">
    			LPSE Kabupaten Siak &copy; 2023
    		</div>


    	</div>
    </div>
    <!-- Footer End -->



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/chart/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/easing/easing.min.js"></script>

    <!-- Required Fremwork -->
	<link  href="<?php echo base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet"  type="text/css">

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>



    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script>
    	$('.custom-file-input').on('change', function () {
    		let fileName = $(this).val().split('\\').pop();
    		$(this).next('.custom-file-label').addClass("selected").html(fileName);
    	})

    </script>

    <?php
    $kategori = [];
	$kategori1 = [];
    foreach ($diagram as $k => $j) :
        array_push($kategori, $j['kategori']);
        array_push($kategori1, $j['total']);
    endforeach;
?>

    <script>
    	// doughnut Chart
    	var ctx5 = $("#diagram").get(0).getContext("2d");
    	var myChart5 = new Chart(ctx5, {
    		type: "doughnut",
    		data: {
    			labels: <?php echo json_encode($kategori); ?> ,
    			datasets : [{
    				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400'],
    				data: <?php echo json_encode($kategori1); ?>
    			}]
    		},
    		options: {
    			responsive: true,

    		}
    	});

    </script>
