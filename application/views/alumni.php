<!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <h1>Daftar Alumni Angkatan 2018</h1>
    </div>
    <hr>
    <div class="row">
      <p>
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#FormModal" id="btn-tambah-alumni">Tambah Alumni</button>
      </p>
    </div>
    <div class="container" id="konten">
      <table class="table table-striped display" id="table-alumni" style="width:100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Angkatan</th>
            <th scope="col">TTL</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>

    <!-- MOdal FOrm -->
    <div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Alumni Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-alumni" name="form-alumni">
              <div class="form-group">
                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <input type="hidden" class="form-control" id="nim_dummy" name="nim_dummy">
                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="angkatan">Angkatan Masuk</label>
                <input type="number" step=1 class="form-control" id="angkatan" name="angkatan" placeholder="Tahun Angkatan Masuk" required>
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
              </div>
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
             
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" form="form-alumni" class="btn btn-primary" id="btn-simpan">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

  <script type="text/javascript">
    $(document).ready(function(){
        var t =$("#table-alumni").DataTable({
                  "columnDefs": [
                    { width: "25%", targets: [2] },
                    { width: "20%", targets: [4] },
                    { width: "15%", targets: [6] },
                    { className: 'text-center', targets: [1,3,6] }
                  ]
                });
        renderTabelAlumni();

        function renderTabelAlumni(){
          t.clear();
          $.ajax({
            url: "<?php echo base_url();?>index.php/Oprec/getListAlumni",
          }).done(function( res ) {
              //alert( "Data Saved: " + res );
              //console.log(res);
              var listAlumni = JSON.parse(res);
             
              for(i=0;i<listAlumni.length;i++){
                var btn_hapus ="<button type='button' class='btn btn-danger btn-sm btn-hapus'  nim='"+listAlumni[i]['nim']+"' nama='"+listAlumni[i]['nama']+"'>Hapus</button>";
                var btn_edit ="<button type='button' class='btn btn-primary btn-sm btn-edit' nim='"+listAlumni[i]['nim']+"' data-toggle='modal' data-target='#FormModal'>Edit</button>";

                var tanggal = new Date(listAlumni[i]['tanggal_lahir']);
                var dd = tanggal.getDate();
                var mm = tanggal.getMonth()+1; 
                var yyyy = tanggal.getFullYear();
                 t.row.add( [
                    i+1,
                    listAlumni[i]['nim'],
                    listAlumni[i]['nama'],
                    listAlumni[i]['angkatan'],
                    listAlumni[i]['tempat_lahir']+', '+dd+"-"+mm+"-"+yyyy,
                    listAlumni[i]['email'],
                    btn_hapus+btn_edit
                ] ).draw( false );
              }
            });
        }

        $("#form-alumni").submit(function(event){
          event.preventDefault();
         
          var dataAlumni = $( this ).serialize();
          //console.log(data);
           $.ajax({
              method: "POST",
              url: "<?php echo base_url();?>index.php/Oprec/simpanData",
              data: dataAlumni, 
            }).done(function( res ) {
              //res {true,false}
              console.log(res);

              var result = JSON.parse(res);

              if(result['status']==1||result['status']=="1"){
                $("#FormModal").modal("hide");
                alert("Data berhasil disimpan");
                var alumni = result['alumni'];

                renderTabelAlumni();

                 /*t.row.add( [
                      0,
                      alumni['nim'],
                      alumni['nama'],
                      alumni['angkatan'],
                      alumni['tempat_lahir']+', '+alumni['tanggal_lahir'],
                      alumni['email'],
                      'action'
                  ]).draw(false);*/

              }
              else if(result['status']==-1||result['status']=="-1"){
                alert("Data GAGAL disimpan");
              }
              else if(result['status']==0||result['status']=="0"){ //res==0
                alert("data NIM sudah ada");
              }
              else{
                alert("data gagal disimpan dengan error: "+res); 
              }
            });
        });

        /*$("#btn-simpan").click(function(){
          $("#form-alumni").submit();
        });*/

        $("#table-alumni tbody").on('click','.btn-hapus', function(){
            var nim = $(this).attr('nim');
            var nama = $(this).attr('nama');
            
            var removingRow = $(this).closest('tr');
            if(confirm("Apakah data alumni "+nim+" "+nama+" ini akan dihapus?")){
              $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>index.php/Oprec/hapusAlumni",
                data: {nim: nim}
              }).done(function( res ) {
      
                if(res==1||res=="1"){
                  alert("Data berhasil dihapus");
                  t.row(removingRow).remove().draw();
                }
                else if(res==0||res=="0"){ //res==0
                  alert("data GAGAL dihapus");
                }
                else{
                  alert("data gagal dihapus dengan error: "+res); 
                }
              });
            }
        });

        $("#table-alumni tbody").on('click','.btn-edit', function(){
            var nim = $(this).attr('nim');
            
            $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>index.php/Oprec/getAlumniByNIM/"+nim,
                data: {}
              }).done(function( res ) {
                var alumni = JSON.parse(res);
                
                $("#nim").val(alumni['nim']);
                $("#nim_dummy").val(alumni['nim']);
                $("#nama").val(alumni['nama']);
                $("#angkatan").val(alumni['angkatan']);
                $("#tempat_lahir").val(alumni['tempat_lahir']);
                $("#tanggal_lahir").val(alumni['tanggal_lahir']);
                $("#email").val(alumni['email']);

                $("#nim").attr('disabled',true);

               
              });
            
            
        });

        $("#btn-tambah-alumni").click(function(){
              $("#nim").val('');
              $("#nim_dummy").val('');
              $("#nama").val('');
              $("#angkatan").val('');
              $("#tempat_lahir").val('');
              $("#tanggal_lahir").val('');
              $("#email").val('');
        });


    });
  </script>