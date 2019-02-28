var app = {
    renderHome: function() {
		$('.maincontent').html(this.welcomeTpl());
		 setTimeout(function(){ 
			// Run the effect
			var options = {direction: 'right' };
			$('.maincontent').html('');
			$( ".maincontent" ).effect( 'slide', options, 300, function(){
				$('.maincontent').html(app.homeTpl());
				window.localStorage.setItem('firstpage',1);
            });			
		 }, 1500);  
		
    },	
	// Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
	// deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        document.addEventListener("backbutton", function(e){			
			if(window.localStorage.getItem('firstpage') == 1){
				e.preventDefault();
				localStorage.clear();
				navigator.app.exitApp();
			} else {
				navigator.app.backHistory();
				history.go(-1);
			} 
		}, false);
		
    },
    initialize: function() {
		var self = this;
		this.bindEvents();
		this.welcomeTpl = Handlebars.compile($("#welcome-tpl").html());
        this.homeTpl = Handlebars.compile($("#home-tpl").html());
		self.renderHome();
    }
};
app.initialize();