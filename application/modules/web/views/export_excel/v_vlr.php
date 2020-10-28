<?php
echo    "<div class='table-responsive'>
                    <table id='traffic' class='table table-bordered' border=1>
                        <thead>
							<tr></tr>
                            <tr>
                                <th>Tanggal</th>
								<th>Region</th> 								
                            </tr>
                        </thead>
                        <tbody>";
        //echo $query1;
		foreach ($vlr as $row){

                echo "<tr>
                        <td style='text-align:center;'>$row[TGL]</td>
                        <td style='text-align:center;'>$row[Region]</td>";
						
            }
                echo "
                        </tbody>    
                    </table>
                </div>";
				
?>				