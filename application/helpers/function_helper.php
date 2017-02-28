<?php
function createSlug($data)	{
	$data=strtolower($data);
	$len=strlen($data);
	for($i=0;$i<$len;$i++)	{
		$asc=ord($data[$i]);
		if(($asc<97 || $asc>122) && ($asc<48 || $asc>57))
			$data[$i]='-';
	}
	
	$count=1;
	while($count)
		$data=str_replace('--','-',$data,$count);
	
	return trim($data,'-');
}
?>