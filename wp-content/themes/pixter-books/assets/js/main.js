$(document).ready(function() {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 3,
        nav: false
      },
      1000: {
        items: 3,
        nav: true,
        loop: false,
        margin: 20
      }
    }
  })
})

jQuery(document).ready(function($){
  $('span.date, input.date').mask('00/00/0000');
  $('input.cep').mask('00000-000');
  $('input.phone').mask(PhoneMaskBehavior, nonoOptions);
});

var PhoneMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
nonoOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(PhoneMaskBehavior.apply({}, arguments), options);
    }
};

function loadmore(){
let pull_page = 1; let jsonFlag = true;
if(jsonFlag){
jsonFlag = false; pull_page++;
$.getJSON("/wp-json/livros/todos-os-livros?page=" + pull_page, function(data){
	if(data.length){
		var items = [];
		$.each(data, function(key, val){
			const arr = $.map(val, function(el) { return el });
			const post_url = arr[1];
			const post_title = arr[3];
			const post_img = arr[4];
			const post_featured = arr[5];
			const post_cat = arr[6];
			const post_class = (class_counter == 2) ? 'post adjust' : 'post';
			let featured = "";
			if(post_featured){
				featured = "featured";
			}
			let item_string = '<ul><li class="item">' + post_title + '</li></ul>'; 
			items.push(item_string);
		}); 
		if(data.length >= 9){ 
			$('li.loader').fadeOut(); 
			$("#project-list").append(items);
		}else{ 
			$("#project-list").append(items); 
			$('#project-loader').hide(); 
			$('#ajax-no-posts').fadeIn(); 
		} 
	}else{ 
		$('#project-loader').hide(); 
		$('#ajax-no-posts').fadeIn(); 
	} 
}).done(function(data){ 
	if(data.length){ jsonFlag = true; } 
});}};
