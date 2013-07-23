<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

                                            if($is_called_already=="no")
                                            {
                                                if($pref_currency_type=="USD")
												{
                                                    $orginal_price_value = currency("GBP","USD",$product->original_value);	
                                                    $product_currency = currency("GBP","USD",$product->price);
												}
                                                else if($pref_currency_type=="EUR")
												{
                                                    $orginal_price_value = currency("GBP","EUR",$product->original_value);	
                                                    $product_currency = currency("GBP","EUR",$product->price);
												}
                                                else
												{
                                                    $orginal_price_value = $product->original_value;	
                                                    $product_currency = $product->price;
												}

                                                $is_called_already = "yes";
                                            }
                                            if($pref_currency_type=="USD"){
                                                if($orginal_price_value==0){
                                                echo '$'.$product_currency.''; 
												} else {
													echo "<del>$".$orginal_price_value.'</del> $'.$product_currency.''; 
												}
                                            } else if($pref_currency_type=="EUR") {
                                            	if($orginal_price_value==0){
                                                 echo '&euro;'.$product_currency.''; 
												} else {
													echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency.''; 
												}
                                            } else {
                                            	if($orginal_price_value==0){
                                               echo '&pound;'.$product_currency.'';
												} else {
													echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency.'';
												}
											}
?>
