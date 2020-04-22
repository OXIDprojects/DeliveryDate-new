[{$smarty.block.parent}]
		[{* This template is used in the 5. Step of the Checkout process. *}]
		[{* It retrieves the value, stores in the Database oxorder:BWdeldate *}]
		[{* BLOCK: checkout_thankyou_info *}]
	        [{assign var="deliveryDate" value=$oView->getDeliveryDate()}]
		[{assign var="deliveryWeekDay" value=$oView->getDeliveryWeekDay()}]
		[{ oxmultilang ident="PAGE_CHECKOUT_THANKYOU_DELIVERYDATE" }]: 
		[{ $deliveryWeekDay }] [{$deliveryDate|date_format:"%d.%m.%Y"}] <br><br>

