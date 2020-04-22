[{$smarty.block.parent}]
		[{* This template is used in the 2. Step of the Checkout process. *}]
		[{* It sets the value, stores in the sdeliveryDate to null *}]
		[{* BLOCK: checkout_user_main *}]
		[{ $oView->destroyDeliveryDate() }]


