<?php
/*function form_error($errors){
    foreach($errors as $key =>$value){
        switch($key){
            case "confirm_password":
                break;
        }
    }
}
*/

function getTimestamp($start_date){
	$sdate=explode(" ",$start_date);
	$date=explode("-",$sdate[0]);
	$time=explode(":",$sdate[1]);
	if($sdate[2]=='AM')
		$date1=$date[2].getIntMonth($date[1]).$date[0].$time[0].$time[1].$time[2];
	else
		$date1=$date[2].getIntMonth($date[1]).$date[0].(((int)$time[0])+12).$time[1].$time[2];
	echo "<br>";
	$date1=mysql_to_unix($date1);
	return $date1;
}

/*function getDate($timestamp){
	$date=unix_to_human($timestamp);
	$date1=explode(" ",$date);
	$date2=explode("-",$date1[0]);
	$date3=array_reverse($date2,true);
	//print_r($date3);
	$date4=implode("-",$date3);
	$sdate=$date4.' '.$date1[1].' '.$date1[2];
	echo $sdate;exit();
	return $sdate;
}
*/
function getIntMonth($month){
	switch($month){
		case 'Jan':
			return "01";
			break;
		case 'Feb':
			return "02";
			break;
		case 'Mar':
			return "03";
			break;
		case 'Apr':
			return "04";
			break;
		case 'May':
			return "05";
			break;
		case 'Jun':
			return "06";
			break;
		case 'Jul':
			return "07";
			break;
		case 'Aug':
			return "08";
			break;
		case 'Sep':
			return "09";
			break;
		case 'Oct':
			return "10";
			break;
		case 'Nov':
			return "11";
			break;
		case 'Dec':
			return "12";
			break;
		default:
			return false;
			break;
	}
}


function getPaginationData($count,$page,$size){
    $page_count=NULL;
    if($page==0){
        $page=1;
    }
    if($count<$size){
        $size=$count;
        $page=1;
    }
    if($count==0 || $size==0)
        return array("page_count"=>1,'page'=>1,'size'=>10);
    if($count%$size==0){
        if($count/$size<$page)
            $page=1;
        $page_count=intval($count/$size);
    }else{
        if($count/$size+1<$page)
            $page=1;
        $page_count=intval(($count/$size)+1);
    }
    
    return array("page_count"=>$page_count,'page'=>$page,'size'=>$size);
}


function randomString($size = '6') {
    $string = '';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    for ($i = 0; $i < $size; $i++)
        $string .= $characters[mt_rand(0, (strlen($characters) - 1))];  
    return $string;
}