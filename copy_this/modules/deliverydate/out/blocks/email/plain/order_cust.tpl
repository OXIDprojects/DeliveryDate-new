[{$smarty.block.parent}]
	[{* This template is used in the Customer Order Confirmation Email. *}]
	[{* BLOCK: email_plain_order_cust_deliveryinfo *}]
	[{assign var="deliveryDate" value=$order->oxorder__BWdeldate->value}]
	[{ assign var=wochentag value=$deliveryDate|date_format:"%a"}]
	[{ oxmultilang ident="EMAIL_ORDER_CUST_HTML_DELIVERYDATE" }]
	[{ oxmultilang ident="$wochentag" }] [{$deliveryDate|date_format:"%d.%m.%Y"}]
