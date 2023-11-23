<?php

	/*Get Page Title */

	function getPageTitle(){

		global $pageTitle ;

		if (isset($pageTitle)) {
			
			echo $pageTitle;
		}
		else
		{

			echo "مركز تعليم اللغة العربية لغير الناطقين بها - جامعة طنطا";
		}
	}


	/*Function to get the active navbar item in each page*/

	function getActiveNav(){

		global $activeNav ;

		if (isset($activeNav)) {
			
			// echo '

			// 	<script type="text/javascript">

	  //               $(document).ready(function () { 

	  //               	$("ul.sidebar-menu > li").eq(' . $activeNav . ').addClass("active");
	  //               });

	  //      		</script>

			// ' ;

			?>

				<script type="text/javascript">

	                $(document).ready(function () { 

	                	$("ul.sidebar-menu > li.<?php echo $activeNav ?>").addClass("active");
	                });

	       		</script>

			<?php


		}
		else{
			echo '' ;
		}
	}


	/*
	Check Item Function
	Check if item exists i database or not
	*/
	function checkItem($field, $table, $value ){

		global $conn;

		$stmt = $conn->prepare("SELECT $field FROM $table WHERE $field = ?");

		$stmt->execute(array($value)) ;

		$count = $stmt->rowCount();

		return $count;

	}



	/*Alert Function With Session And Header*/
	
	function alert($session, $alertId, $alertClass, $icon, $msg ){

		 echo"<div class='alert " . $alertClass . " ' id= ". $alertId ." style='display:none'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa " . $icon . " '></i>
                " . $msg . "
                  
              </div>" ;

                if(isset($_SESSION[$session]) && $_SESSION[$session] ==1 ){

                  echo"
                    <script>
                        $(document).ready(function(){
                          $(". $alertId .").fadeIn(1000).delay(9000).fadeOut(1000) ;
                        });
                    </script>
                   " ;

                    $_SESSION[$session] = 0;                  
                }

	}


	/*ID of Ckeditor editor that active editor and upload images*/

	function ckeditorID($id){
		echo"
			<script>
		    if(CKEDITOR) {
		      CKEDITOR.replace(". $id .", {
		        'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
		        'filebrowserImageUploadUrl': 'plugins/ckeditor/plugins/imgupload.php'
		      });
		    }
		    </script>
		";
	}