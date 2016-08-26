<?php 

function menuMulti($data,$parent_id = 0,$char ="---|",$select = 0){
	foreach ($data as $key => $value) {
		# code...

		if($value["parent_id"] == $parent_id) {

			if($select != 0 && $value['category_id'] == $select)
			{
				echo '<option selected="" value="'.$value["category_id"].'">'.$char." ".$value["name"].'</option>';
			}
			else {
				echo '<option value="'.$value["category_id"].'">'.$char." ".$value["name"].'</option>';
			}
			
			menuMulti($data,$value["category_id"],$char ."---|");
		}
		
	}
}

function menuli($data,$parent_id = 0,$char ="---|"){
	foreach ($data as $key => $value) {
		# code...
		echo "<ul class='nav navbar-nav'>";
		if($value["parent_id"] == $parent_id) {

				// echo '<option value="'.$value["category_id"].'">'.$char." ".$value["name"].'</option>';
			
			echo '<li class="active"><a href="'.$value->alias.'" >'.$value["name"].'</a></li>';
				 menuli($data,$value['category_id']);
			
			
			
			
		}
		echo "</ul>";
	}
}
function listMulti($data,$parent_id = 0,$char ="|---"){
	foreach ($data as $key => $value) {
		# code...

		if($value["parent_id"] == $parent_id) {
			echo '<tr class="odd gradeX">';
				echo '<td>'.$value["category_id"].'</td>';
				echo '<td>'.$value["name"].'</td>';
				echo '<td>'.$value["alias"].'</td>';
				
				echo '<td>'.$char.$value["name"].'</td>';

				echo '<td>';
				$active = $value['active'];

                            if ($active == 1 ) { 

                                echo '<form action="'.route("menu/deactive",''.$value["category_id"].'').'" method="post" accept-charset="utf-8">';
                                        echo '<input type="hidden" name="_token" value="'.csrf_token().'" />';
                                        echo '<input type="hidden" name="active" value="0"/>';
                                        echo '<button class="btn btn-success btn-xs" value="submit" ><span class="glyphicon glyphicon-ok"></span></button>';
                                echo '</form>';
                             }
                            else { 
                                echo '<form action="'.route("menu/active",''.$value["category_id"].'').'" method="post" accept-charset="utf-8">';
                                        echo '<input type="hidden" name="_token" value="'.csrf_token().'" />';
                                        echo '<input type="hidden" name="active" value="1"/>';
                                        echo '<center><button class="btn btn-danger btn-xs" value="submit" ><span class="glyphicon glyphicon-remove"></span></i></button></center>';
                                echo '</form>';

                                } 
                     echo '</td>';
                    echo '<td>';
                    echo '<a class="btn btn-info btn-xs" href="'.route('admincp.menu.edit',$value["category_id"]) .'"><span class="glyphicon glyphicon-edit"></span> Edit</a> ';
                    if($value["parent_id"] != 0) {
                    echo '<a class="btn btn-danger btn-xs" href="'.url('admincp/menu/destroy',$value["category_id"]) .'"><span class=" glyphicon glyphicon-remove"></span> Del</a> ';
                     }
                    echo '</td>';


				
				
				


				listMulti($data,$value["category_id"],$char ."|---");


			echo '</tr>';
			
			
				
			
			
			
		}
		
	}
}


 ?>