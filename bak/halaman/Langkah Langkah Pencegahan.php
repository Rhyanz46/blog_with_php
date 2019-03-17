<style>@import url('css/font-awesome.min.css')</style>
<style>@import url('css/bootstrap.min.css')</style>
<style>@import url('css/mdb.min.css')</style>
<style>@import url('css/style.css')</style>
<div class="text-center mb-4">
    <div class="card card-body">
        <div id="dataa">

        </div>
        <div class="row container" style="margin-top: 50px">
            <button class="btn btn-sm btn-danger" onclick="window.location.href=''" style="">Keluar</button>
             <span class="next" style="bottom:30px; right: 10%; position: absolute;cursor: pointer;">Baca Selanjutnya</span>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript">

  var ajaxe  = new XMLHttpRequest();
  var method  = "GET";
  var asynchronous = true;
  var url = 'halaman/data_pencegahan.php';
  var html = '';
  var jumlah = 0;
  var jumlah_data = 0;

  ajaxe.open(method, url, asynchronous);
  ajaxe.send();
  ajaxe.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(this.responseText);
          jumlah = data.length;

          for (i = 0; i < jumlah; i++) { 
              var postt = data[i].post.substr(0,40);
            html += '<div datake="' + i + '" class="text-left" style="margin-top: 10px; border-style: solid; border-color: white white black white; display: none"><span onclick="buka(' + data[i].id + ')" style="color: red; cursor: pointer;" id="judul">' + data[i].judul + '</span><br><p id="isinya">' + postt + '</p></div>';
          }
          document.getElementById('dataa').innerHTML = html;
          document.getElementsByClassName('text-left')[0].style.display = 'block';
          document.getElementsByClassName('text-left')[1].style.display = 'block';
          document.getElementsByClassName('text-left')[2].style.display = 'block';
          
          console.log(data);
    }
  }

  // var tombol_kembali = document.createElement('button');
  // tombol_kembali.innerHTML = 'sebelumnya';
  // tombol_kembali.classList.add("btn");
  // tombol_kembali.classList.add("btn-sm");
  // tombol_kembali.classList.add("btn-danger");

  var sign = 0;
  var ii = 3;
  $('.next').click(function(){
    var aaa = ii + 3;
    var noo = ii;
    for(ii = ii ;ii < aaa; ii++){
      show(ii,noo);
    }
    // document.getElementsByClassName('row')[0].appendChild(tombol_kembali);
  });

  function show(ii,noo){    
      if (ii < jumlah) {
        if (parseInt(jumlah-1) == ii) {
          document.getElementsByClassName('next')[0].innerHTML = '';
          return;
        }else{
          console.log('mantap');
          document.getElementsByClassName('text-left')[ii].style.display = 'block';
          for(var mm = 0; mm <= noo-1; mm++){
            document.getElementsByClassName('text-left')[mm].style.display = 'none';
          }
        }
        // console.log(parseInt(jumlah-1) == ii);
        // console.log("ii = "+ii,"noo :" +noo,"total : " + parseInt(jumlah-1));
      }
  }
  function buka(id){
      var ajaxe  = new XMLHttpRequest();
      var method  = "GET";
      var asynchronous = true;
      var url = 'halaman/data_pencegahan_detail.php?id=' + id;
      var html = '';
      var jumlah = 0;
      var jumlah_data = 0;

      ajaxe.open(method, url, asynchronous);
      ajaxe.send();
      ajaxe.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var data_detail = '<span style="font-size: large; "><strong>' + data[0].judul + '</strong></span>' + '<br><span style="float:left; cursor: pointer;">' + data[0].post + '</span>';
              document.getElementById('dataa').innerHTML = data_detail;
            
              console.log(data[0].post);
        }
          document.getElementsByClassName('next')[0].innerHTML = '';
      }
  }
// setInterval(function(){ alert("Hello"); }, 3000);


</script>