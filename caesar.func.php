<?php
function caesar_cipher($string,$action='ENCODE',$movement=10){
	$alphabet = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
					  'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
					  '1','2','3','4','5','6','7','8','9','0');
	
	$arr = str_split($string);
	$str = '';
	if($action=='ENCODE'){
		for($i=0;$i<count($arr);$i++){
			if(in_array($arr[$i],$alphabet)){
				$position = array_search($arr[$i],$alphabet);//62
				$new_position = $position+$movement;
				if($new_position>61){
					$new_position = $new_position - 62;
				}
				$str .= $alphabet[$new_position];
			}else{
				$str .= $arr[$i];
			}
		}
	}elseif($action=='DECODE'){
		for($i=0;$i<count($arr);$i++){
			if(in_array($arr[$i],$alphabet)){
				$position = array_search($arr[$i],$alphabet);//62
				$new_position = $position - $movement;
				if($new_position<0){
					$new_position = $new_position + 62;
				}
				$str .= $alphabet[$new_position];
			}else{
				$str .= $arr[$i];
			}
		}
	}
	return $str;
}

echo caesar_cipher('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
echo '<br>';
echo caesar_cipher(caesar_cipher('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),'DECODE');
?>
