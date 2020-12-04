<!DOCTYPE html>
<html>
<head>
	<title>Hello World..!</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	
</head>
<body>
	<h1>Hello World..</h1>
	<!-- <button id="btn-action">Sukses</button>
	<button id="btn-action2">Sukses AJAX</button>
	<br>
	Ini Hasilnya:
	<div id="result"></div> -->

	<select name="a" id="dropdown1">
		<option value="">Jenis Alert</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
	</select>

	<div class="dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Alert
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    <a class="dropdown-item" href="#" value="primary">Alert-Primary</a>
	    <a class="dropdown-item" href="#" value="success">Alert-Success</a>
	    <a class="dropdown-item" href="#" value="danger">Alert-Danger</a>
	  </div>
	</div>
	<div id="alert-label" class="alert alert-primary" role="alert">
	  A simple primary alert—check it out!
	</div>

	<button id="btn-popup-alert" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Jenis Alert yang dipilih</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Alert yang dipilih adalah: <label id="label-modal-content"></label>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
	      </div>
	    </div>
	  </div>
	</div>

</body>
<script type="text/javascript">
	$( document ).ready(function() {
	  // Handler for .ready() called.
	  	$("#btn-popup-alert").click(function(){
	  		var jenis_alert = $("#dropdown1").val();
	  		if(jenis_alert==""){
	  			$("#label-modal-content").text("jenis_alert belum dipilih");
	  		}
	  		else{
	  			$("#label-modal-content").text(jenis_alert);
	  		}
	  		
	  	});

	  	$("#btn-action").click(function(){
	  		//alert("klik berhasil");
	  		//$("#result").html("Alhamdulillah");
	  		$("#result").load("<?php echo base_url();?>index.php/Hello/getResult");
	  	});

	  	$("#btn-action2").click(function(){
	  		$.ajax({
			  url: "<?php echo base_url();?>/index.php/Hello/getResult"
			}).done(function(result) {
			  $("#result").text(result);
			});
	  	});

	  	$("#dropdown1").on('change', function(){
	  		var value = $(this).val();
	  		$("#alert-label").text(value);
	  	});

	  	$(".dropdown-item").click(function(){
	  		var value = $(this).attr("value");
	  		
	  		if(value=="primary"){
	  			$("#alert-label").text("A simple primary alert—check it out!");
	  			$("#alert-label").removeAttr("class");
	  			$("#alert-label").addClass("alert alert-primary");
	  		}
	  		else if(value=="success"){
	  			$("#alert-label").text("A simple success alert—check it out!");
	  			$("#alert-label").removeAttr("class");
	  			$("#alert-label").addClass("alert alert-success");
	  		}
	  		else if(value=="danger"){
	  			$("#alert-label").text("A simple danger alert—check it out!");
	  			$("#alert-label").removeAttr("class");
	  			$("#alert-label").addClass("alert alert-danger");
	  		}
	  	});
	});
</script>
</html>