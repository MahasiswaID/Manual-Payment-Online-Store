/*$('.ui-form'){
  .form({
    fields: {
      name: {
        identifier: 'nama',
        rules: [
          {
            type: 'empty',
            prompt: 'Masukkan nama'
          }
        ]
      }
    }
  })
}*/

/*$("#unsave-form").areYouSure({
  message: 'Ada beberapa perubahan yang belum disimpan. Yakin ingin keluar dari halaman ini?'
});*/

//$("#imgPreview img").height($("#imgPreview").width());

$(".tombol-order").click(function(){
  $('.small.modal').modal('show');
});

$(".kotak-produk .detail-order a:last-child").click(function(){
  $('.small.modal').modal('show');
});

$(".ui.top.attached.menu>.item").click(function(){
  $('.ui.sidebar').sidebar('toggle');
});

$('.special.cards .image').dimmer({
  on: 'hover'
});

$(window).bind("load resize",function(){
  $("#imgPreview").height($("#imgPreview").width());
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


$('.ui.radio.checkbox')
  .checkbox()
;

$("#unsave-form").areYouSure({
  message: 'Ada beberapa perubahan yang belum disimpan. Yakin ingin keluar dari halaman ini?'
});

if($(window).height() > $(".login-form").height()){
  $(".login-form").css("top",($(window).height()-$(".login-form").height())/2 - 40);
}

if($(window).height() > $(".user-form").height()){
  $(".user-form").css("marginTop",($(window).height()-$(".user-form").height())/2);
}

$(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;

  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top - 90
          }, 1000);
          return false;
        }
      }
    });
  });

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
