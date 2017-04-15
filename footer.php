<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
	</div><!-- #container -->
		<br class="clearfloat" />
		<footer class="footer">
			<div class="container normel-back" style="width: 100%;padding-top: 18px;color: gray;">
				<p>Copyright © 2011-2015 <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
				<ul class="inline">
				  <li>Powered By: <a href="http://wordpress.org/">WordPress</a></li>
				  <li class="muted">|</li>
				  <li>Theme: <a href="#">Utage</a></li>
				</ul>
			</div>
		</footer><!-- #footer -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
	<script type="text/javascript" src="http://api.hitokoto.us/rand?encode=js&charset=utf-8"></script>

	<div style="display: none;" id="hitokoto"><script>hitokoto()</script></div>
	<script>
		var ggv;
		$('.disabled a, .active a').on('click', function(e) {
			e.preventDefault();
		});
		
		$('#hkt-wait').html("");
		if(jQuery.isFunction(hitokoto)){
			$('#hkt-wait').append($('.hitokoto'));
		}else{
			$('#hkt-wait').append('<b>获取数据失败了&gt;&lt;</b>');
		}

		function AdwFanliModel() {
			var self = this;
		}
		ggv = new AdwFanliModel();
		ko.applyBindings(ggv);
	</script>
</body>
</html>