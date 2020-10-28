<?php	
	//TRAFFIC CHART
        echo "
            <div class='box-body table-responsive' style='margin-top:10px'>
            <table id='traffic' class='table table-bordered' border=1>
                <thead>
					<tr></tr>
                    <tr>
                        <th >Tanggal</th>
                        <th >2G</th>
                        <th >3G</th>
                        <th >Region</th>
                    </tr>
                </thead>
                <tbody>";        
                
			foreach ($sql  as $row){
                echo "<tr>
                        <td>$row[TGL]</td>
                        <td>$row[Band_2G]</td>    
                        <td>$row[Band_3G]</td>
                        <td>$row[Region]</td> ";
                echo "</tr>"; 
            }
                echo "
                </tbody>    
            </table>
        </div>"; 
	
?>

