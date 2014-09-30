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
		Make the header menu fixed to window top after scrolling past the header logo
		 */
		$('.header-menu').stickIt({
			float: 'left',
			gridContainer: 'body',
			gridContainerPadding: 0
		});


		/*
		Hide arrow icon on the homepage after scrolling 50px
		 */
		$(window).on('scroll', function() {
			var $window = $(this);
			var $arrow = $('.icon-arrow');
			
			if ($window.scrollTop() > 50) {
				$arrow.fadeOut(200);
			} else if ($window.scrollTop() < 90) {
				$arrow.fadeIn(200);
			}
		});


		/*
		Change with of instagram image container based on number of images
		 */
		var $imagesContainer = $('.section-instagram-images');
		if ($imagesContainer.find('img').length > 10 && $imagesContainer.find('img').length < 19) {
			var containerWidth = $imagesContainer.find('img').length * 132;
			$imagesContainer.css({
				'width': containerWidth + 'px',
				'margin-left': '-'+(containerWidth/2)+'px'
			});

		}


    });

})(jQuery);