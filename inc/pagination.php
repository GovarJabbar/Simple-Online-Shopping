<?php

	// Table Name
	$name= 'products';

	// Category ID
	$cat=$_GET['id'];

	// Limited Product
	$page_rows = 12;

	$query=mysqli_query($conn,"select count(id) from `$name` WHERE category_id='$cat'");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];
	

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['page'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
	}

	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	
	$nquery=mysqli_query($conn,"select * from `$name` WHERE category_id='$cat' $limit");

	$pagination = '';

	if($last != 1){
		
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$pagination .= '<a href="'.$_SERVER['PHP_SELF'].'?id='.$cat.'&page='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
		
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $pagination .= '<a href="'.$_SERVER['PHP_SELF'].'?id='.$cat.'&page='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	
	$pagination .= ''.$pagenum.' &nbsp; ';
	
	for($i = $pagenum+1; $i <= $last; $i++){
		$pagination .= '<a href="'.$_SERVER['PHP_SELF'].'?id='.$cat.'&page='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $pagination .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?id='.$cat.'&page='.$next.'" class="btn btn-default">Next</a> ';
    }
	}

?>