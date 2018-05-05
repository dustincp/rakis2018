<?php include "header.php" ?>
<style>
.childQuestion {
	margin-bottom:20px;
}
.childQuestion .callout {
	line-height: 34px;	
}
.childQuestion input {
	color: #000;	
}
.admissionType {
	float:right;	
}
.radio {
	width: auto;
	display: inline;
	margin-right:5px;
}
label {
	display:block;
	font-size:18px;
	padding-bottom:3px;
}
input, select {
	display: block;
	width: 100%;
	margin-bottom: 20px;
	font-size: 16px;
	padding: 5px;
	box-sizing: border-box;
	background: #222;
	color: #ccc;
	border: none;
	border-radius: 3px;
	border:1px solid #222;	
}
input:focus, select:focus {
	outline:none;
	border:1px solid #999;	
}
.admissionType select {
	width:530px;	
}
.submit-button {
	clear: both;
	width: auto;
	float: right;
	background: #999;
	color: #000;
	padding: 5px 20px;
}
.submit-button:focus {
	border:none;
}
h2 {
	clear: both;
	font-size: 18px;
	font-weight: normal;
	margin-right: 10px;
	float: right;
}
.spaceleft {
	margin-left:20px;
}
.hide {
	display:none;	
}
label.error {
	color: #851417;
	margin: -14px 0 12px 0;
}
.daytrip {
	text-align:left;	
	border-collapse:collapse;
}
.daytrip td, .daytrip th {
	padding:8px;
	border:1px solid #333;
}
.leftCol {
	width:48%;	
	margin-right:2%;
	float:left;
}
.rightCol {
	margin-left:2%;
	width:48%;	
	float:left;
}
form {
	overflow:hidden;
}
span.small {
	font-size:15px;	
}
.image-right {
width: 730px;
margin-right: 0;
}
</style>
<h1>Rakis 2014 Hoodies</h1>
<img class="fr imgFrame" src="img/hoodie2.jpg" style="margin-top:-50px;height:225px;" />
<div class="image-right">
<p>We had such a great response to the first round of hoodies, that we're going to place a second order for anyone that missed out. If you're local, hoodies will be the same price as they were at the event. We'll arrange a trip to drop them off or you can come pick them up from Denver. If you're a bit farther away, we can ship them directly to you for a little extra. We can order sizes from small to 5XL. Please specify a size for each hoodie when you place your order. All hoodies will be zippered.</p>
<p>This is your last chance to get a hoodie from this year's Rakis. This page will be taken down on July 1st, so please get your order in now.</p>
</div>
<hr />
<div class="shipQuestion">
    <label class="callout">Would you like to pick up your hoodies and save on shipping?</label>
    <span class="callout"><input type="radio" name="isPickup" value="yes" class="radio yesPickup" checked="true">Yes <input type="radio" name="isPickup" value="yes" class="radio spaceleft noPickup">No</span>
</div>
<hr />
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="pickupForm">
<p><span class="callout">Please only choose this option if you play in one of the core Iron Mountains provinces, or can pick your order up from one of those parks.</span> We will attempt to deliver hoodies in bulk to each park. Once we know where we need to get them to, we'll post a delivery schedule. If you would like your hoodie sooner than we are able to deliver, your park can send a representative to Denver to collect them.</p>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2TUKJYNBH3QWN">
<input type="hidden" name="on0" value="How many hoodies would you like?">
<input type="hidden" name="on1" value="Hoodie Sizes">
<input type="hidden" name="on2" value="Order Destination">
<input type="hidden" name="currency_code" value="USD">
<div class="leftCol">
<label for "os0">How many hoodies would you like?</label>
<select name="os0">
	<option value="1 Hoodie">1 Hoodie $35.00 USD</option>
	<option value="2 Hoodies">2 Hoodies $70.00 USD</option>
	<option value="3 Hoodies">3 Hoodies $105.00 USD</option>
	<option value="4 Hoodies">4 Hoodies $140.00 USD</option>
	<option value="5 Hoodies">5 Hoodies $175.00 USD</option>
</select>
</div>
<div class="rightCol">
<label for"os1">Hoodie Sizes <span class="small">(please specify a size for each hoodie: SM-5XL)</span></label>
<input type="text" name="os1" maxlength="200" class="required">
</div>
<div class="clear">
<label for="os2">What Iron Mountains core park would you like us to deliver your order to?</label>
<input type="text" name="os2" maxlength="200" class="required">
</div>
<input type="submit" border="0" name="submit" class="submit-button" value="Pay Now">
</form>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="shipForm" class="hide">
<p><span class="callout">Please choose this option if you do not play in one of the core Iron Mountains provinces.</span> It costs a little extra, but we'll ship your order directly to you.</p>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JGSGXPYDJKALW">
<input type="hidden" name="on0" value="How many hoodies would you like?">
<input type="hidden" name="on1" value="Hoodie Sizes">
<input type="hidden" name="currency_code" value="USD">
<div class="leftCol">
<label for "os0">How many hoodies would you like? <span class="small">(Price includes shipping)</span></label>
<select name="os0">
	<option value="1 Hoodie">1 Hoodie $44.50 USD</option>
	<option value="2 Hoodies">2 Hoodies $82.00 USD</option>
	<option value="3 Hoodies">3 Hoodies $121.00 USD</option>
</select>
</div>
<div class="rightCol">
<label for"os1">Hoodie Sizes <span class="small">(please specify a size for each hoodie: SM-5XL)</span></label>
<input type="text" name="os1" maxlength="200" class="required">
</div>
<input type="submit" border="0" name="submit" class="submit-button" value="Pay Now">
</form>

<script src="/js/jquery.validate.min.js"></script>
<script>

$().ready(function() {
	$('#pickupForm').validate();
	$('#shipForm').validate();
	
	$('input[name=isPickup]').change(function () {
		console.log(this);
		if ($(this).hasClass("yesPickup")){
			$('#pickupForm').show();
			$('#shipForm').hide();
		} else {
			$('#pickupForm').hide();
			$('#shipForm').show();
		}
	});
});

</script>
<?php include "footer.php" ?>