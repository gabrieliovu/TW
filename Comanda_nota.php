<?php namespace App\comanda;

use App\Model\Comenzi;

// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Comanda_nota {
    public function functionNota() {
        // print_r(Comenzi::getAll());
		$array = Comenzi::getAll();
		
		$price = array('suc'=>0.01,'cafea'=>5);
		
		
		$total = 0;
		foreach($array as $value=>$key)
		{
			if($key !=0)
			{
				$total = $price[$value]*$key;
			}
		}
	
	echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="iovu.gabriel@yahoo.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Payments">
<input type="hidden" name="amount" value="'.$total.'">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="cn" value="Add special instructions to the seller:">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="http://proiect:8080/iesire">
<input type="hidden" name="cancel_return"     value="http://proiect:8080/nota">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<input type="image" src="http://travelwithgrant.com/wp-content/uploads/2013/10/PP_Logo.jpg"  height="50px" width="120px"   border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
';
	
	 echo 'You have to pay :'.$total;
		
		
		
        echo '<br>';
		
		
    }
}