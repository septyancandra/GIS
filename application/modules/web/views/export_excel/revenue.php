<?php
//header('Content-type: text/vnd-ms-excel');
        // Mendefinisikan nama file ekspor "hasil-export.xls"
//header("Content-Disposition: attachment; filename=$judul".'_'.date("Ymd").'.xls');
echo    "<div class='table-responsive'>
                    <table id='traffic' class='table table-bordered' border=1>
                        <thead>
                            <tr>
                                <th rowspan='2' >Region</th>
                                <th colspan='3' >Revenue DtD</th>
                                <th colspan='3' >Revenue MtD</th>
                                <th colspan='3' >Revenue YtD</th>
                            </tr>
                            <tr>
                                <th >$dsplnow</th>
                                <th >$dspltgl</th>
                                <th >Growth</th>
                                <th >$dsplastmonth</th>
                                <th >$dspnowmonth</th>
                                <th >Growth</th>
                                <th >$dsplastmonth1</th>
                                <th >$dsplastmonth2</th>
                                <th >Growth</th>
                            </tr>
                        </thead>
                        <tbody>";                        
                        foreach ($sql as $row){
                            $datenow = number_format($row['DATENOW'],0);
                            $dow = number_format($row['DOW'],0);
                            $momprev = number_format($row['MOM1'],0);
                            $momlast = number_format($row['MOM2'],0);
                            $yoyprev = number_format($row['YOY1'],0);
                            $yoylast = number_format($row['YOY2'],0); 
                            $growthdow = number_format(($row['DATENOW']-$row['DOW'])/$row['DOW']*100,0);
                               
                            $growthdom = number_format(($row['MOM2']-$row['MOM1'])/$row['MOM1']*100,0);
                                
                            $growthdoy = number_format(($row['YOY1']-$row['YOY2'])/$row['YOY2']*100,0);
                                
                         
                            echo    "<td>$row[REGION]</td>
                                    <td>$datenow</td>
                                    <td>$dow</td>";
                                    if ($growthdow>=0) {
                                        echo "<td style='color:green;'><span class='badge active' style='background-color: green;'>" . $growthdow ."%</span></td>";
                                    } else {
                                            echo "<td style='color:red;'><span class='badge active' style='background-color: red;'>" . $growthdow ."%</span></td>";
                                    }
                            echo    "<td>$momprev</td>
                                    <td>$momlast</td>";
                                    if ($growthdom>=0) {
                                        echo "<td style='color:green;'><span class='badge active' style='background-color: green;'>" . $growthdom ."%</span></td>";
                                    } else {
                                            echo "<td style='color:red;'><span class='badge active' style='background-color: red;'>" . $growthdom ."%</span></td>";
                                    }
                            echo    "<td>$yoylast</td>
                                    <td>$yoyprev</td>";
                                    if ($growthdoy>=0) {
                                        echo "<td style='color:green;'><span class='badge active' style='background-color: green;'>" . $growthdoy ."%</span></td>";
                                    } else {
                                            echo "<td style='color:red;'><span class='badge active' style='background-color: red;'>" . $growthdoy ."%</span></td>";
                                    }
                                    "";
                            echo "
                            </tr>"; 
                            
                            }

                        echo "
                        </tbody>    
                    </table>
                </div>";
			//INI
echo    "<div class='table-responsive'>
                    <table id='traffic' class='table table-bordered' border=1>
                        <thead>
							<tr></tr>
                            <tr>
                                <th>Tanggal</th>
								<th>2G</th>
								<th>3G</th>
								<th>Region</th>
                            </tr>
                        </thead>
                        <tbody>";                
        foreach ($sql2 as $row){

                echo "<tr>
                        <td style='text-align:center;'>$row[TGL]</td>
                        <td style='text-align:center;'>$row[Band_2G]</td>
						<td style='text-align:center;'>$row[Band_3G]</td>
						<td style='text-align:center;'>$row[Region]</td>";
						
            }
                echo "
                        </tbody>    
                    </table>
                </div>";
				
?>