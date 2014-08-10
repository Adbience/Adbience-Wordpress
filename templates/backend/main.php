<h1>Adbience</h1>

<p>Welcome to the Adbience Plugin for Wordpress. Adbience is an exclusive business network that connects businesses to opportunities that will allow them to grow.
	Please enter your keys belows to start using Adbience on your site. If you are unsure of keys, please log into <a target="_blank" href="http://www.adbience.com">http://www.adbience.com</a>.
	</p>


<?php if($_POST): ?>
	<?php update_option( 'adb_key', $_POST['adbience_key'] ); ?>
	<?php update_option( 'adb_secret', $_POST['adbience_secret'] ); ?>
	<?php update_option( 'adb_cus_id', $_POST['adbience_customer_id'] ); ?>
<?php endif; ?>

<form method="post">
	
	<div class="form-group">
		<label>Enter Adbience Key</label>
		<input type="text" name="adbience_key" value="<?= get_option( 'adb_key', ''); ?>" />
	</div>
	
	<div class="form-group">
		<label>Enter Adbience Secret</label>
		<input type="text" name="adbience_secret" value="<?= get_option( 'adb_secret', ''); ?>" />
	</div>
	
	<div class="form-group">
		<label>Enter Adbience Customer ID</label>
		<input type="text" name="adbience_customer_id" value="<?= get_option( 'adb_cus_id', ''); ?>" />
	</div>
	
	<div class="form-group">
		<input type="submit" name="Update" />
	</div>
</form>