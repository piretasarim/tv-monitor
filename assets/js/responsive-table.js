(function($) {

    $.fn.responsiveTable = function(method) {
    	  var plugin = this;
        var methods = {
          init : function(options) {
            this.responsiveTable.settings = $.extend({}, this.responsiveTable.defaults, options);
          	 // iterate through all the DOM elements we are attaching the plugin to
            return this.each(function() {
                var $element = $(this), // reference to the jQuery version of the current DOM element
                    element = this;     // reference to the actual DOM element
                if($(window).width()<=plugin.responsiveTable.settings.width){
                	plugin.addTitle($element);
                }
                $(window).resize(function() {
                	if($(this).width()<=plugin.responsiveTable.settings.width){
                		plugin.addTitle($element);
                	}else{
                		plugin.removeTitle($element);
                	}
                });
            });
          }
        };

        this.addTitle = function($element){
          if(this.responsiveTable.settings.displayTitle === true){
          	  var titles =[];
							$element.find('.th').each(function(){
								titles.push($(this).text());
							});
							if($element.find('span').length==0){
								$element.find('.tbody .tr').each(function(index){
		              $(this).children().each(function(index){
	                  $(this).html("<span>"+titles[index]+":</span> "+$(this).html());
		              });
		            });
							}
	            
          }
        }

        this.removeTitle = function($element){
        	$element.find('.tbody .tr').each(function(index){
            $(this).children().each(function(index){
                $(this).find('span').remove();
            });
          });
        }

        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error( 'Method "' +  method + '" does not exist in responsiveTable plugin!');
        }
    }

    $.fn.responsiveTable.defaults = {
        displayTitle : true,
        width: 480
    }

    $.fn.responsiveTable.settings = {}
})(jQuery);