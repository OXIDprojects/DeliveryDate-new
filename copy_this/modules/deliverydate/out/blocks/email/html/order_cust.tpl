[{$smarty.block.parent}]
	[{* This template is used in the Customer Order Confirmation Email. *}]
	[{* BLOCK: email_html_order_cust_deliveryinfo *}]
            <h3 style="font-weight: bold; margin: 20px 0 7px; padding: 0; line-height: 35px; font-size: 12px;font-family: Arial, Helvetica, sans-serif; text-transform: uppercase; border-bottom: 4px solid #ddd;">
                [{ oxmultilang ident="EMAIL_ORDER_CUST_HTML_DELIVERYDATE" }]
            </h3>
		[{assign var="deliveryDate" value=$order->oxorder__BWdeldate->value}]
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 5px 0 10px;">
		 [{$deliveryDate|date_format:"%d.%m.%Y"}] <br><br></p>
