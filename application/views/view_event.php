		<br>
		<br>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="event_title"><b>Event Title</b></label>
			</div>:
			<div class="form-group col-md-6">
				<label for="event_title"><?php echo $record['event_title'] ?> </label>
			</div>
		</div>

	  	<table class="table">
		    <thead>
		      	<tr>
			        <th>Date</th>
			        <th>Day Name</th>
		      	</tr>
		    </thead>
		    <tbody>
	    	<?php 

	    		if (!empty($week_days)) { 
	    			foreach ($week_days as $key => $row) { ?>
				      	<tr>
					        <td><?php echo $key; ?></td>
					        <td><?php echo $row; ?></td>
				      	</tr>
	    			<?php  
	    		 	}
	    		}
	    	?>
		    </tbody>
		    Total Recurrence Event : <?php echo $total_records; ?>
		  </table>

