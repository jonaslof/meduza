(function($) {

    $(document).ready(function() {

    	/*
    	* Form validation
    	*/
    	var forms = document.getElementsByTagName('form');
		for (var i = 0; i < forms.length; i++) {
		    forms[i].noValidate = true;

		    if(!forms[i].addEventListener) {
		    	forms[i].attachEvent('onsubmit', function(event) {
			        //Prevent submission if checkValidity on the form returns false.
			        if (!event.target.checkValidity()) {
			            event.preventDefault();
			            //Implement you own means of displaying error messages to the user here.
			            $this = $(this);
			            $this.find('.form-validation-message').remove();
			            $this.find('input.error').removeClass('error');
			            $.each($this.find('input[required]'), function(){
			            	if($(this).val() === '') {
			            		$this = $(this);
			            		$this.addClass('error');
			            		$this.after('<div class="form-validation-message error">Du måste fylla i det här fältet.</div>');
			            	}
			            });
			        }
			    });
		    }
		    else {
		    	forms[i].addEventListener('submit', function(event) {
			        //Prevent submission if checkValidity on the form returns false.
			        if (!event.target.checkValidity()) {
			            event.preventDefault();
			            //Implement you own means of displaying error messages to the user here.
			            $this = $(this);
			            $this.find('.form-validation-message').remove();
			            $this.find('input.error').removeClass('error');
			            $.each($this.find('input[required]'), function(){
			            	if($(this).val() === '') {
			            		$this = $(this);
			            		$this.addClass('error');
			            		$this.after('<div class="form-validation-message error">Du måste fylla i det här fältet.</div>');
			            	}
			            });
			        }
			    }, false);
		    }
		}


		/*
		* Reset subcategory select on article search form submit
		*/
		$('#article-search').on('change', '#article-search-select-category', function(){
			var category = $(this).val();
			$('#article-search-select-subcategory').val($('#article-search-select-subcategory option:first').val());
			if(category == 'alla') {
				$('#hidden-article-category').remove();
			} else {
				$('#hidden-article-category').val(category);
			}
			$('#article-search').submit();
		});

		/*
		* Add values to hidden field on article sub category change
		 */
		 $('#article-search').on('change', '#article-search-select-subcategory', function() {
		 	var subcat = $(this).val();
		 	console.log(subcat);
		 	if(subcat == 'none') {
		 		$('#hidden-article-category').val($('#article-search-select-category').val());
		 	} else {
		 		$('#hidden-article-category').val($(this).val());
		 	}	
		 	$('#article-search').submit();
		 });

		 $('#article-search').on('click', '.article-tag-label', function(){
		 	$(this).toggleClass('checked');
		 });

		 $('#article-search').on('change', '.article-tag-checkbox', function() {
		 	$('#article-search').submit();
		 });

		/**
		 * Single article image gallery
		 */
		$('.gallery-thumbnails').on('click', 'img', function(){
			$(this).siblings().addClass('is-not-current');
			$(this).removeClass('is-not-current');
			$currentImage = $('.gallery-featured.current');
			$('.gallery').append('<div class="gallery-featured incoming" style="position: absolute; top: 0px; z-index: -1;"><img src="' + $(this).attr('data-image-large-src') + '" width="' + $(this).attr('data-image-large-src') + '" height="' + $(this).attr('data-image-large-src') + '"></div>');
			$currentImage.fadeOut(400, function(){
				$(this).remove();
				$('.gallery-featured.incoming').css({'position': 'relative', 'z-index' : '0'}).removeClass('incoming').addClass('current');
			});
		});


		/*
		Draw article price popup on click
		 */
		$('.create-tag').on('click', function() {
			var $this = $(this),
				article_id = $this.data('article');
				siteurl = $('#site-url').data('url');
				
			var html = $.get(siteurl + '/wp-content/themes/alimenta/article-price-popup.php?article_id=' + article_id + '&position=above', function(data) {
				$this.parent().prepend(data);
			});
		});

		/*
		Add article to print list when submiting article price form
		 */
		$('body').delegate('.article-price-form', 'submit', function(e){
			e.preventDefault();
			var $form = $(this),
				articleID = $form.data('article'),
				amount = $form.find('.amount').val(),
				totalPrice = $form.find('.total-price').val(),
				unitPrice = $form.find('.unit-price').val(),
				siteurl = $('#site-url').data('url'),
				url = siteurl + '/wp-content/themes/alimenta/functions/add_to_print_list.php?action=add&post_id=' + $(this).data('article') + '&amount=' + amount + '&total_price=' + totalPrice + '&unit_price=' + unitPrice;

			$.getJSON( url, function(data) {
				if(data.status === 'added') {
					var $printList = $('#print-list');
					$printList.show();
					var $tagsCount = $printList.find('.tags-count');
					var count = parseInt($tagsCount.text());

					var printListItem = '<div class="print-list-item-title">' + data.tag.artnr + ' ' + data.tag.title;
					if(data.tag.price.total_price != '' || data.tag.price.amount != '' || data.tag.price.unit_price != '') {
						printListItem += '<br><span class="print-list-item-price">';
						if(data.tag.price.total_price != '') {
							printListItem += data.tag.price.total_price + ':- ';
						}
						if(data.tag.price.amount != '') {
							printListItem += 'för ' + data.tag.price.amount + ' st. ';
						}
						if(data.tag.price.unit_price != '') {
							printListItem += 'Styckepris ' + data.tag.price.unit_price + ':-';
						}

						printListItem += '</span>';
					}

					printListItem += '</div>';

					$printList.find('.print-list-items').append('<li class="print-list-item" id="print-list-item-' + data.tag.ID + '">' + printListItem + '<button class="btn btn-remove remove-from-print-list" data-article="' + data.tag.ID + '"><div class="icon dashicons dashicons-trash"></div></button></li>');
					$tagsCount.text(count+1);
					$form.parent().parent().remove();
				}
			});
		});

		/*
		Delete article price popup on click
		 */
		$('body').delegate('.article-price-popup-close', 'click', function(){
			$(this).parent().parent().remove();
		});


		/*
		Add article to print list on click
		 */
		$('body').delegate('.add-to-print-list', 'click', function() {
			var siteurl = $('#site-url').data('url');
			var url = siteurl + '/wp-content/themes/alimenta/functions/add_to_print_list.php?action=add&post_id=' + $(this).data('article');
			$.getJSON( url, function(data) {
				if(data.status === 'added') {
					var $printList = $('#print-list');
					$printList.show();
					var $tagsCount = $printList.find('.tags-count');
					var count = parseInt($tagsCount.text());
					$printList.find('.print-list-items').append('<li class="print-list-item" id="print-list-item-' + data.tag.ID + '"><div class="print-list-item-title">' + data.tag.artnr + ' ' + data.tag.title + '</div><button class="btn btn-remove remove-from-print-list" data-article="' + data.tag.ID + '"><div class="icon dashicons dashicons-trash"></div></button></li>');
					$tagsCount.text(count+1);
					$('.article-price-popup').remove();
				}
			});
		});


		/*
		Remove article from print list on click
		 */
		$('#print-list').delegate('.remove-from-print-list', 'click', function() {
			var siteurl = $('#site-url').data('url');
			var url = siteurl + '/wp-content/themes/alimenta/functions/add_to_print_list.php?action=delete&post_id=' + $(this).data('article');
			$.getJSON( url, function(data) {
				if(data.status === 'deleted') {
					var $printList = $('#print-list');
					var $tagsCount = $printList.find('.tags-count');
					var count = parseInt($tagsCount.text());
					$printList.find('#print-list-item-' + data.tag.ID).remove();
					$tagsCount.text(count-1);
					if(count == 1) {
						$printList.hide();
					}
				}
			});
		});


		/*
		Expand list of articles in print list while hovering over print list
		 */
		$('#print-list').on('mouseover', function(){
			$(this).find('.print-list-items').show();
		}).on('mouseout', function(){
			$(this).find('.print-list-items').hide();
		});


		/*
		Extra order form add articles to form on click
		 */
		$('.order-form-search').delegate('.add-to-order-form', 'click', function() {
			var $this = $(this),
				$listItem = $this.parent(),
				$orderFormArticles = $('.order-form-articles');

			if($listItem.data('categories').indexOf('Tårtor') >= 0) {
				//If it is a cake it will have a textarea for cake label text
				var articleOutput = '<div class="order-form-article">';
				articleOutput += '<label for="article-' + $listItem.data('article') + '" class="order-form-article-label">';
				articleOutput += '<input type="checkbox" checked="checked" name="articles['+ $listItem.data('article') +'][id]" id="article-' + $listItem.data('article') + '" class="checkbox" value="' + $listItem.data('article') + '">';
				articleOutput += $listItem.data('artnr') + ' ' + $listItem.data('title') + '</label>';
				articleOutput += '<label class="label-short label-amount visible-in-ie ie-inline-block">Antal: </label>'
				articleOutput += '<input type="number" name="articles['+ $listItem.data('article') +'][amount]" class="input-text order-form-article-amount" placeholder="Antal">';
				articleOutput += '<label for="cake-text-'+$listItem.data('article')+'" class="cake-text-description"><small>Om du vill ha text på tårtan. Ange vad det ska stå och hur många av tårtorna som ska ha texten.</small></label>';
				articleOutput += '<textarea name="articles['+ $listItem.data('article') +'][caketext]" class="input-text input-textarea" rows="2" cols="50"></textarea>';
				articleOutput += '</div>';
				$orderFormArticles.append(articleOutput);
			}
			else {
				var articleOutput = '<div class="order-form-article">';
				articleOutput += '<label for="article-' + $listItem.data('article') + '" class="order-form-article-label">';
				articleOutput += '<input type="checkbox" checked="checked" name="articles['+ $listItem.data('article') +'][id]" id="article-' + $listItem.data('article') + '" class="checkbox" value="' + $listItem.data('article') + '">';
				articleOutput += $listItem.data('artnr') + ' ' + $listItem.data('title') + '</label>';
				articleOutput += '<label class="label-short label-amount visible-in-ie ie-inline-block">Antal: </label>'
				articleOutput += '<input type="number" name="articles['+ $listItem.data('article') +'][amount]" class="input-text order-form-article-amount" placeholder="Antal">';
				articleOutput += '</div>';
				$orderFormArticles.append(articleOutput);
				//$orderFormArticles.append('<div class="order-form-article"><label for="article-' + $listItem.data('article') + '" class="order-form-article-label"><input type="checkbox" checked="checked" name="articles[]" id="article-' + $listItem.data('article') + '" class="checkbox" value="' + $listItem.data('article') + '">' + $listItem.data('artnr') + ' ' + $listItem.data('title') + '</label><label class="label-short label-amount visible-in-ie ie-inline-block">Antal: </label><input type="number" name="amount_' + $listItem.data('article') + '" class="input-text order-form-article-amount" placeholder="Antal"></div>');
			}
			$('.order-form-search-list').empty();
		});


		/*
		Extra order form search articles
		 */
		$('#order-form-search').on('keyup', function(){
			var $this = $(this),
				url = $this.data('script'),
				searchString = $this.val(),
				$searchList = $('.order-form-search-list');
			$searchList.addClass('is-loading');	
			delay(function(){
				$.getJSON(url + '?s=' + searchString, function(data){
					if(data.status == 'ok') {
						$searchList.find('.order-form-search-list-item').remove();
						$.each(data.posts, function(){
							var post = this;
							if($searchList.find('#item-' + post.id).length == 0){
								$searchList.prepend('<li class="order-form-search-list-item" id="item-' + post.id + '" data-title="' + post.title + '" data-article="' + post.id + '" data-artnr="' + post.artnr + '" data-categories="' + post.categories + '"><div class="order-form-search-list-item-title">' + post.artnr + ' ' + post.title + '</div><button class="btn btn-primary btn-small add-to-order-form">Lägg till</button></li>');
							}
						});
					} else if(data.status == 'error') {
						if($searchList.find('#nothing').length == 0){
							$searchList.find('.order-form-search-list-item').remove();
							$searchList.prepend('<li id="nothing" class="order-form-search-list-item"><div class="order-form-search-list-item-title">Inga artiklar hittades</div></li>');
						}
					}
				});
			}, 300);
		});

		/*
		Delay function used to delay an event
		 */
		var delay = (function(){
			var timer = 0;
			return function(callback, ms){
				clearTimeout (timer);
				timer = setTimeout(callback, ms);
			};
		})();


		/*
		Make the print list fixed to window top after scrolling past the header
		 */
		$('#print-list').stickIt();


    });

})(jQuery);