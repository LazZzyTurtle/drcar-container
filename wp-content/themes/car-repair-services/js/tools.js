$(document).ready(function () {
	function clearColor(){
		jQuery('body').removeClass('color-green color-blue color-violet')
	}
	
	jQuery('.tools a').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		if ($this.hasClass('color-green')){
			clearColor();
			jQuery('body').addClass('color-green')
		}
		if ($this.hasClass('color-blue')){
			clearColor();
			jQuery('body').addClass('color-blue')
		}
		if ($this.hasClass('color-violet')){
			clearColor();
			jQuery('body').addClass('color-violet')
		}
		if ($this.hasClass('color-yellow')){
			clearColor();
		}
	})

})