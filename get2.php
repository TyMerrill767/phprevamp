<?php
			require('mysqli_connect.php');
			$q = "SELECT Album_Art, Concat(Title, ' ', Release_Date) AS Title, Albums.Album_id AS id, destination, direction, Available.Location, Available.Location2, Available.Location3 FROM Albums INNER JOIN Available ON Albums.Album_id = Available.Album_id";
			$t = "SELECT Name FROM Songs WHERE Album_id = 1";
			$b = "SELECT Name FROM Songs WHERE Album_id = 2";
			$n = "SELECT Name FROM Songs WHERE Album_id = 3";
			$r = "SELECT Name FROM Songs WHERE Album_id = 4";
			$p = "SELECT Name FROM Songs WHERE Album_id = 5";
			$z = "SELECT Name FROM Songs WHERE Album_id = 11";
			$result = mysqli_query($dbcon, $q);
			$result1 = mysqli_query($dbcon, $t);
			$result2 = mysqli_query($dbcon, $b);
			$result3 = mysqli_query($dbcon, $n);
			$result4 = mysqli_query($dbcon, $r);
			$result5 = mysqli_query($dbcon, $p);
			$result6 = mysqli_query($dbcon, $z);
			if ($result)
			{
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				   {
				       echo '<div class="col-small-6 col-med-6 col-lg-4 albumContainer">';
				       echo '<img src="' . $row['Album_Art'] . '" alt="">';
				       echo '<div class="panel-group" id="accordion">';
				       echo '<div class="panel panel-default">';
				       echo '<div class="panel-heading">';
				       echo '<h2 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href=' . $row['direction'] . '>' . $row['Title'] . '</a></h2></div>';
				       echo '<div id=' . $row['destination'] . ' class="panel-collapse collapse"><div class="panel-body"> <ol>';
				       if($row['id']==1)
				       {
				       		foreach ($result1 as $row1)
				       		{
				        		echo '<li>' . $row1['Name'] . '</li>';

				    		};
						}
						if($row['id']==2)
						{
							foreach ($result2 as $row2)
							{
								echo '<li>' . $row2['Name'] . '</li>';

							};
						}
						if($row['id']==3)
						{
							foreach ($result3 as $row3)
							{
								echo '<li>' . $row3['Name'] . '</li>';
							}
						}
						if($row['id']==4)
						{
							foreach ($result4 as $row4)
							{
								echo '<li>' . $row4['Name'] . '</li>';
							}
						}
						if($row['id']==5)
						{
							foreach ($result5 as $row5)
							{
								echo '<li>' . $row5['Name'] . '</li>';
							}
						}
						if($row['id']==11)
						{
							foreach ($result6 as $row6)
							{
								echo '<li>' . $row6['Name'] . '</li>';
							}
						}
						echo '</ol>';
				    	echo '<h3>available at:</h3><a href=' . $row['Location'] . '>iTunes</a>
				   		<a href=' . $row['Location2'] . '>Amazon</a>
				    	<a href=' . $row['Location3'] . '>United Interests</a></div>';
				    	echo '</div></div></div></div>';
				    }
					    mysqli_free_result ($result);
			}
				else
				{
				    echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
				    echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
				}
				mysqli_close($dbcon);
				?>
