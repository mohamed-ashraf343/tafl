<?php
	
	/*Website Base Url [ Change when Upload site ]*/

	$GLOBALS['url'] = 'http://localhost/tafl/';

	function base_url(){

	    echo $GLOBALS['url'];
	}


	/*Get Page Title */

	function getPageTitle(){

		global $pageTitle ;

		if (isset($pageTitle)) {
			
			echo $pageTitle;
		}
		else
		{
			echo "Teaching Arabic as a Foreign Language - Tanta University";
		}
	}


	/*Function to get the active navbar item in each page*/

	function getActiveNav(){

		global $activeNav ;

		if (isset($activeNav)) {
			
			echo '

				<script type="text/javascript">

	                $(document).ready(function () { 

	                	$("ul.navbar-nav > li").eq(' . $activeNav . ').addClass("current");
	                });

	       		</script>

			' ;

		}
		else{
			echo '' ;
		}
	}


	/*
	Check Item Function
	Check if item exists in database or not
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
                          $(". $alertId .").fadeIn(1000).delay(6000).fadeOut(1000) ;
                        });
                    </script>
                   " ;

                    $_SESSION[$session] = 0;                  
                }

	}



// Slug

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
