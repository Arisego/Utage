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
				<p>Copyright © 2011-2018 <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
				<ul class="inline">
				  <li>Powered By: <a href="http://wordpress.org/">WordPress</a></li>
				  <li class="muted">|</li>
				  <li>Theme: <a href="#">Utage</a></li>
				</ul>
			</div>
		</footer><!-- #footer -->
	</div><!-- #page -->
	<?php wp_footer(); ?>

	<script>
		var ggv;
		$('.disabled a, .active a').on('click', function(e) {
			e.preventDefault();
		});
		
		$(document).ready(function() {
			function showpanel() {
				$.getJSON(
						'<?php echo get_template_directory_uri()."/hitokoto/hitokoto.php" ?>',
						function(data){
							if(data.length == 0){
								$('#hkt-wait').html('<b>获取数据失败了&gt;&lt;</b>');
								return false;
							}else{
								$('#hkt-wait').html("<b title='来自:"+ (data.source.length==0?'佚名':data.source) +"'>"+data.hitokoto+"</b>");
								return true;
							}
						}
				);
			}

			setTimeout(showpanel, 10);	
		});


		function AdwFanliModel() {
			var self = this;
		}
		ggv = new AdwFanliModel();
		ko.applyBindings(ggv);
	</script>
</body>
</html>