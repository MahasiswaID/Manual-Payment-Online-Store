$(".tombol-order").click(function(){
  $('#myModal').modal('show');
});

$(".kotak-widget .edit-button .left a:first-child").click(function(){
  $(".kotak-widget .edit-section").slideUp(300);
  $(this).parents(".kotak-widget").children(".edit-section").slideDown(300);
});

$(".hapus-gambar").click(function(){
  if($(this).hasClass('aktif')){
    $(this).children('input').removeAttr('checked','false');
    $(this).removeClass('aktif');
  }else{
    $(this).children('input').attr('checked','true');
    $(this).addClass('aktif');
  }
});

$(window).bind("load resize",function(){
  $("#imgPreview").height($("#imgPreview").width());
  var banyakSlide = $(".gambar-lain .dalam").length;
  var lebarSlide = $(".gambar-lain").width();
  var ngeslide = 0;

  $(".gambar-lain").width(parseInt($(".gambar-lain").width() / 64) * 64);

  $(".gambar-lain .dalam").width($(".gambar-lain .gambar").length * 64);

  setInterval(function(){
    keKanan();
  },5000);

  function keKanan(){
    if(-ngeslide < ((banyakSlide-1)*lebarSlide)){
      ngeslide -= lebarSlide;
    }else{
      ngeslide = 0;
    }
    $(".gambar-lain .dalam").animate({
      marginLeft : ngeslide
    });
  }

  function keKiri(){
    if(ngeslide == 0){
      ngeslide = -(banyakSlide-1)*lebarSlide;
    }else{
      ngeslide += lebarSlide;
    }
    $(".gambar-lain .dalam").animate({
      marginLeft : ngeslide
    });
  }

  $("#kekanan").click(function(){
    keKanan();
  });

  $("#kekiri").click(function(){
    keKiri();
  });

  $(".slide-image img").width($("#image-slider").width());
  $("#image-slider .dalam").width(banyakSlide * $("#image-slider").width());


});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#inputFoto").change(function() {
    readURL(this);
});

$(document).bind('DOMSubtreeModified',function(){
  $(".tambahin-gambar input").change(function() {
    //ubahGambar(this);
    var tmppath = URL.createObjectURL(event.target.files[0]);
    var file = $(this).val();
    //$(this).siblings('label').html("<img src='"+tmppath+"'/>");
    $(this).siblings('img').attr('src',tmppath);
    //alert(tmppath);
    if (this.file) {
    }
  });
})

var i = 1;
$("#tambah-gambar").click(function(e){
  $('.list-gambar').append('<div class="tambahin-gambar" style="margin-bottom:5px;">'+
    '<!--<i style="cursor:pointer;color:#f11;" class=\'close hapus icon\'></i>-->'+
    '<img style="height:70px;width:70px;" src="/assets/images/phsmall.png"/>'+
    ' <input name=\'gambar[]\' style="display:none;" id="gambarTambah'+i+'" type=\'file\' accept="image/*"/>'+
    '<label for="gambarTambah'+i+'"><i class="edit icon"></i></label>'+
  '</div>');
  $(".list-gambar").append($("#tambah-gambar"));
  i++;
  e.stopPropagation();
});

$(document).change(function(){
  $(".tambahin-gambar .hapus").click(function(){
    $(this).parent('div').remove();
  });
});

$(document).ready(function(){
    $('#myTable').DataTable();
});


$("#unsave-form").areYouSure({
  message: 'Ada beberapa perubahan yang belum disimpan. Yakin ingin keluar dari halaman ini?'
});

if($(window).height() > $(".login-form").height()){
  $(".login-form").css("top",($(window).height()-$(".login-form").height())/2 - 40);
}

if($(window).height() > $(".user-form").height()){
  $(".user-form").css("marginTop",($(window).height()-$(".user-form").height())/2);
}

$(document).ready(function(){
  $(".gambar-lain .gambar").click(function(){
    var srcBaru = $(this).attr('srcnya');
    $(".gambar-utama img").attr('src',srcBaru);
  });
});

$(document).delegate('#textbox', 'keydown', function(e) {
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
      e.preventDefault();
      var start = $(this).get(0).selectionStart;
      var end = $(this).get(0).selectionEnd;

      // set textarea value to: text before caret + tab + text after caret
      $(this).val($(this).val().substring(0, start)
                  + "\t"
                  + $(this).val().substring(end));

      // put caret at right position again
      $(this).get(0).selectionStart =
      $(this).get(0).selectionEnd = start + 1;
    }
  });
