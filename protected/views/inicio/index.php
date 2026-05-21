
	<div id="slideshow" align="center">

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/7.png"/>
		</div>

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.png"/>
		</div>

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/2.png"/>
		</div>

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/3.png"/>
		</div>

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/4.png"/>
		</div>
		
		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5.png"/>
		</div>

		<div>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/6.png"/>
		</div>


	</div>

<script type="text/javascript">
	$(function() {
	$("#slideshow > div:gt(0)").hide();
	setInterval(function() {
	  $('#slideshow > div:first')
	    .fadeOut(1500)
	    .next()
	    .fadeIn(1500)
	    .end()
	    .appendTo('#slideshow');
	},  10000);
});
</script>


<