		</div> <!-- #content -->
	</div> <!-- #main -->

	<div class="footer">

		<div class="wrapper">

			

			<p>&copy;<?php echo date('Y'); ?> <a href="petruschan.com" target="_blank">Petrus Chan</a>.</p>

		</div>
	
	</div>
	<script src="<?php echo BASE_URL; ?>js/jquery-2.2.1.js"></script>	
	<script src="<?php echo BASE_URL; ?>js/jquery.smoothState.js"></script>	
	<script src="<?php echo BASE_URL; ?>js/main.js"></script>	
	<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>	
<script>
    $(document).ready(function()     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $(".products").html(data);
                    
                },
                success:function(data)
                {
                    $(".products").html(data);
                },
            });
        });
        
    });
    
</script>
</body>
</html>