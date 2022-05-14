
	<form action="" class="" method="post" data-parsley-validate>
		<?php echo validation_errors(); ?>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="event_title">Event Title: </label>
			</div>
			<div class="form-group col-md-6">
				<!-- <input type="text" class="form-control" id="event_title" name="event_title" required data-parsley-required data-parsley-required-message="Please enter event title."> -->
				<input type="text" class="form-control" id="event_title" value="<?php echo isset($record['event_title'])?$record['event_title']:''; ?>" name="event_title">
			</div>
		</div>
		<div class="input-daterange" id="datepicker">
			<div class="row">
				<div class="form-group col-md-2">
					<label for="start_date">Start Date: </label>
				</div>
				<div class="form-group col-md-6">
					<input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo isset($record['start_date'])?date('m/d/Y',strtotime($record['start_date'])):''; ?>" required data-parsley-required data-parsley-required-message="Please select start date .">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="end_date">End Date: </label>
				</div>
				<div class="form-group col-md-6">
					<input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo isset($record['end_date'])?date('m/d/Y',strtotime($record['end_date'])):''; ?>" required data-parsley-required data-parsley-required-message="Please select end date .">
				</div>

			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="">Recurrence: </label>
			</div>
			<div class="form-check">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" id="radio1" data-parsley-required name="recurrence_type" <?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==0)?'checked':''; ?> value="0">Repeat
				</label>
			</div>&nbsp;&nbsp;
			<div class="form-check">
				<label class="form-check-label" for="radio2">
				<input type="radio" class="form-check-input" id="radio2" data-parsley-required name="recurrence_type" <?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==1)?'checked':''; ?> value="1">Repeat on the
				</label>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="">&nbsp;&nbsp; </label>
			</div>
			<div class="form-group col-md-4 recurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==0)?'block':'none'; ?>;">
				<select class="form-control" id="repeats" name="repeats">
					<option value="Every" <?php echo (isset($record['repeats']) && $record['repeats']=='Every')?'selected':''; ?>>Every</option>
					<option value="Every Other" <?php echo (isset($record['repeats']) && $record['repeats']=='Every Other')?'selected':''; ?>>Every Other</option>
					<option value="Every Third" <?php echo (isset($record['repeats']) && $record['repeats']=='Every Third')?'selected':''; ?>>Every Third</option>
					<option value="Every Fourth" <?php echo (isset($record['repeats']) && $record['repeats']=='Every Fourth')?'selected':''; ?>>Every Fourth</option>
				</select>
			</div>
			<div class="form-group col-md-4 recurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==0)?'block':'none'; ?>;">
				<select class="form-control" id="repeat_every" name="repeat_every">
					<option value="Day" <?php echo (isset($record['repeat_every']) && $record['repeat_every']=='Day')?'selected':''; ?>>Day</option>
					<option value="Week" <?php echo (isset($record['repeat_every']) && $record['repeat_every']=='Week')?'selected':''; ?>>Week</option>
					<option value="Month" <?php echo (isset($record['repeat_every']) && $record['repeat_every']=='Month')?'selected':''; ?>>Month</option>
					<option value="Year" <?php echo (isset($record['repeat_every']) && $record['repeat_every']=='Year')?'selected':''; ?>>Year</option>
				</select>
			</div>
			<div class="form-group col-md-3 occurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==1)?'block':'none'; ?>;">
				<select class="form-control" id="repeat_occur" name="repeat_occur">
					<option value="First" <?php echo (isset($record['repeat_occur']) && $record['repeat_occur']=='First')?'selected':''; ?>>First</option>
					<option value="Second" <?php echo (isset($record['repeat_occur']) && $record['repeat_occur']=='Second')?'selected':''; ?>>Second</option>
					<option value="Third" <?php echo (isset($record['repeat_occur']) && $record['repeat_occur']=='Third')?'selected':''; ?>>Third</option>
					<option value="Fourth" <?php echo (isset($record['repeat_occur']) && $record['repeat_occur']=='Fourth')?'selected':''; ?>>Fourth</option>
				</select>
			</div>
			<div class="form-group col-md-3 occurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==1)?'block':'none'; ?>;">
				<select class="form-control" id="repeat_week" name="repeat_week">
					<option value="Sunday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Sunday')?'selected':''; ?>>Sunday</option>
					<option value="Monday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Monday')?'selected':''; ?>>Monday</option>
					<option value="Tuesday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Tuesday')?'selected':''; ?>>Tuesday</option>
					<option value="Wednesday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Wednesday')?'selected':''; ?>>Wednesday</option>
					<option value="Thursday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Thursday')?'selected':''; ?>>Thursday</option>
					<option value="Friday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Friday')?'selected':''; ?>>Friday</option>
					<option value="Saturday" <?php echo (isset($record['repeat_week']) && $record['repeat_week']=='Saturday')?'selected':''; ?>>Saturday</option>
				</select>
			</div> <span class="occurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==1)?'block':'none'; ?>;">Of the</span> 
			<div class="form-group col-md-3 occurrence-show" style="display:<?php echo (isset($record['recurrence_type']) && $record['recurrence_type']==1)?'block':'none'; ?>;">
				<select class="form-control" id="repeat_month" name="repeat_month">
					<option value="Month" <?php echo (isset($record['repeat_month']) && $record['repeat_month']=='Month')?'selected':''; ?>>Month</option>
					<option value="3 Months" <?php echo (isset($record['repeat_month']) && $record['repeat_month']=='3 Months')?'selected':'';?>>3 Months</option>
					<option value="4 Months" <?php echo (isset($record['repeat_month']) && $record['repeat_month']=='4 Months')?'selected':'';?>>4 Months</option>
					<option value="6 Months" <?php echo (isset($record['repeat_month']) && $record['repeat_month']=='6 Months')?'selected':'';?>>6 Months</option>
					<option value="Year" <?php echo (isset($record['repeat_month']) && $record['repeat_month']=='Year')?'selected':''; ?>>Year</option>
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<script type="text/javascript">
$('.input-daterange').datepicker({
});	

$('input[type=radio]').change(function(){
	if (this.value=='1') {
		$('.occurrence-show').show();
		$('.recurrence-show').hide();
	} else {
		$('.recurrence-show').show();
		$('.occurrence-show').hide();
	}
});	



</script>