[{$smarty.block.parent}]
		[{* This template is used in the 3. Step of the Checkout process. *}]
		[{* BLOCK: change_shipping *}]
		<div id="deliverydate">		
		<form action="[{ $oViewConf->getSslSelfLink() }]" name="deliveryDate" id="deliveryDate" method="post">
                    <div>
                        [{ $oViewConf->getHiddenSid() }]
                        [{ $oViewConf->getNavFormParams() }]
                        <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
                        <input type="hidden" name="fnc" value="setDeliveryDate">
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    <h3 id="deliveryHeader" class="panel-title">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_DELIVERYDATE_HEADLINE" }]</h3>
                    </div>
                    <div class="panel-body">
                    <ul>
			[{ assign var="deliveryDate" value=$oView->getDeliveryDate()}]
			[{ if ! $oView->isBeforeDeadline() }]
				<li>[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_DELIVERYDATE_NOTTODAY" }]</li>
			[{/if}]
			<li> <select name="sDeliveryDate" onChange="JavaScript:document.forms.deliveryDate.submit();">
				[{foreach item=item from=$oView->getDeliveryDateArray()}]
					<option value="[{$item}]" [{if $item==$deliveryDate}]SELECTED[{/if}]>[{$item|date_format:"%d.%m.%Y" }]</option>
				[{/foreach}]
			     </select>
			</li> 
   		    </ul>
		    <div class="hidden">
			[{ $oView->getDeliveryDate() }]
			[{ assign var=sdatum value=$oView->getDeliveryDate() }]	
                    </div> 
		    </div>
		</form>
		</div>
		
	
