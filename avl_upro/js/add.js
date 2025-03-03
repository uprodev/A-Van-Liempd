jQuery(document).ready(function($) {

	$(document).on('click', '.load_kennis a', function(e){
		e.preventDefault();
		let _this = $(this);
		let div = $('.load_kennis');

		let data = {
			'action': 'load_kennis',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_kennis').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						div.remove();               
					}
				} else {                              
					div.remove();                   
				}
			}
		});
	}); 


	let offset = 3;
	$('#more_related a').on('click', function(e) {
		e.preventDefault();
		let _this = $(this);

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data: {
				action: 'load_related',
				offset: offset,
				page_id: $(_this).attr('data-page_id')
			},
			success: function(response) {
				if (response) {
					$('#ajax_related').append(response);
					offset += 3;
					if(offset >= parseInt($(_this).attr('data-count'))) $('#more_related').hide();
				} else {
					$('#more_related').hide();
				}
			}
		});
	});


	$(document).on('click', '.load_vacatures a', function(e){
		e.preventDefault();
		let _this = $(this);
		let div = $('.load_vacatures');

		let data = {
			'action': 'load_vacatures',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_vacatures').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						div.remove();               
					}
				} else {                              
					div.remove();                   
				}
			}
		});
	}); 


	$('.input-wrap-check input[type="checkbox"]').change(function() {
		var isChecked = $(this).prop('checked');
		var $submitButton = $(this).closest('form').find('button[type="submit"]');
		$submitButton.prop('disabled', !isChecked);
	});
	
});