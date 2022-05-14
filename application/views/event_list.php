  	<!-- <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>             -->
  	<a href="<?php echo base_url('add-event') ?>" class="btn btn-primary float-right">Add</a>
  	<table class="table">
	    <thead>
	      	<tr>
		        <th>#</th>
		        <th>Event Title</th>
		        <th>Dates</th>
		        <th>Occurrence</th>
	        	<th>Actions</th>
	      	</tr>
	    </thead>
	    <tbody>
    	<?php 
    		if (!empty($records)) { 
    			$i=0;
    			foreach ($records as $row) { $i++; ?>
			      	<tr>
			        	<td><?php echo $i; ?></td>
				        <td><?php echo $row['event_title']; ?></td>
				        <td><?php echo $row['start_date'].' to '.$row['end_date']; ?></td>
				        <td><?php echo ($row['recurrence_type']==1)?'Every '.$row['repeat_occur'].' '.$row['repeat_week'].' of the '.$row['repeat_month']:$row['repeats'].' '.$row['repeat_every']; ?></td>
				        <td>
						  	<a href="<?php echo base_url('edit-event/'.$row['id']) ?>" class="btn btn-outline-primary">Edit</a>
						  	<a href="<?php echo base_url('view-event/'.$row['id']) ?>" class="btn btn-outline-secondary">View</a>
						  	<a href="<?php echo base_url('delete-event/'.$row['id']) ?>" class="btn btn-outline-dark">Delete</a>
				        </td>
			      	</tr>
    			<?php  
    		 	}
    		}
    	?>
	    </tbody>
	  </table>
	</div>