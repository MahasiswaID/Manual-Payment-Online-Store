$('.special.cards .image').dimmer({
  on: 'hover'
});

$('.ui.dropdown').dropdown();

$(".kotak-produk .detail-order a:last-child").click(function(){
  $('.small.modal').modal('show');
});

$(".ui.top.attached.menu>.item").click(function(){
  $('.ui.sidebar').sidebar('toggle');
});

$('.ui.radio.checkbox')
  .checkbox()
;


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
