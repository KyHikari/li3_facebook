<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId:  '<?=$this->facebook->getAppId();?>',
			status: true,
			cookie: true,
			xfbml:  true,
			oauth:  true
		});
	};

	// Load the SDK Asynchronously
	(function(d){
		var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		ref.parentNode.insertBefore(js, ref);
	}(document));
</script>