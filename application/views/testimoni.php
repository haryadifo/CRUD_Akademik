<!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="container">
    <!-- Example row of columns -->
    <div class="row" id="konten">
      
    </div>

    <hr>

  </div> <!-- /container -->

  <script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
          url: "<?php echo base_url();?>index.php/Oprec/getListTestimoni",
        }).done(function( res ) {
            //alert( "Data Saved: " + res );
            var listTestimoni = JSON.parse(res);
            var konten="";
            for(i=0;i<listTestimoni.length;i++){
                konten+=" <div class='col-md-6'><h2>"+listTestimoni[i]['nama']+"</h2><label> Timestamp:"+listTestimoni[i]['tanggal']+"</label><p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p><p><a class='btn btn-secondary' href='#' role='button'>View details &raquo;</a></p></div>";
            }

            $("#konten").html(konten);

            //console.log(listTestimoni);
            //console.log(res);
          });


    });
  </script>