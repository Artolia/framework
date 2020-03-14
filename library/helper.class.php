<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class helper{

    public function formatmoney($money, $currency="Rp"){
		if($money < 0){
			return $currency." (".number_format(abs($money), 0, ",", ".").")";
		}
		return $currency." ".number_format($money, 0, ",", ".");
	}
}
?>