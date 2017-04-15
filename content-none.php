
<div class="alert alert-danger hero cyinfo">
	<legend>没有内容</legend>
	当前没有可以显示的内容，这可能是由以下原因引起的：
		<ol>
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<li>您的搜索条件过于严格</li>
			<?php endif ?>		
			<li>您的输入所对应的内容已经移动、隐藏或者删除</li>
			<li>您的输入中有错误</li>
			<li>网站暂时处于不正常的状态</li>
		</ol>
	<p class="text-success">您可以尝试进行搜索或者浏览其他内容</p>
</div><!-- #post -->
