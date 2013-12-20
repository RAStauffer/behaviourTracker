<div id="logForm">
	<form action="./behavior/readform" method="post">
		<br />Log Entry<br />
		<div style="left:0;">
			<textarea cols="92" rows="5" name="logentry"><?php echo (isset($_SESSION["logentry"]) ? $_SESSION["logentry"] : "");?></textarea>
		</div>
		
		<div style="left:0;">
			<select name="trigger">
				<?php foreach ($beh_triggers as $beh_trigger) :
				echo "<option value='$beh_trigger->title'>$beh_trigger->title</option>";
		endforeach; ?>
			</select><input type="text" name="newTrigger"
				placeholder="New Trigger"
				value="<?php echo (isset($_SESSION["newTrigger"]) ? $_SESSION["newTrigger"] : ''); ?>" />
		</div>

		<div style="left:0;">
			<select name="response">
				<?php foreach ($beh_responses as $beh_response) :
				echo "<option value='$beh_response->title'>$beh_response->title</option>";
		endforeach; ?>
			</select><input type="text" name="newResponse"
				placeholder="New Response"
				value="<?php echo (isset($_SESSION["newResponse"]) ? $_SESSION["newResponse"] : ''); ?>" />
		</div>
		
		<div style="left:0;">
			<input type="submit" name="submit" value="Submit" /> <input
				type="hidden" name="submitted" value="true" />
		</div>
	</form>
</div>
