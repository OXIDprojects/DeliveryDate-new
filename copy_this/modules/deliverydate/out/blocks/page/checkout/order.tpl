[{$smarty.block.parent}]
	[{* This template is used in the 4. Step of the Checkout process. *}]
	[{* BLOCK: shippingAndPayment *}]

		<div id="orderPayment">
                    <form action="[{ $oViewConf->getSslSelfLink() }]" method="post">
			    <div class="hidden">
                            	[{ $oViewConf->getHiddenSid() }]
                            	<input type="hidden" name="cl" value="payment">
                            	<input type="hidden" name="fnc" value="">
			    </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            [{oxmultilang ident="PAGE_CHECKOUT_ORDER_DELIVERYDATE_HEADLINE"}]
					<button type="submit" class="btn btn-xs btn-warning pull-right submitButton largeButton" title="[{oxmultilang ident="EDIT"}]">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        [{ assign var="deliveryDate" value=$oView->getDeliveryDate() }]
					[{ assign var="deliveryWeekDay" value=$oView->getDeliveryWeekDay() }]
					[{ $deliveryWeekDay }] 
                    			[{$deliveryDate|date_format:"%d.%m.%Y"}]
                                    </div>
                                </div>
                    </form>
		</div>

