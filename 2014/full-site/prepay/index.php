<?php include "../header.php" ?>
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
	color: #999;
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
form {
	overflow:hidden;
	margin-top: -89px;
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
</style>
<h1>Rakis 2014 Pre-Registration</h1>
<p>Pre-Registration is now closed, but you're still welcome to pay once you get to site. The event fee is $20. If you'll only be attending one day, see the schedule below.</p>
<hr />
<h1>Day Trip Information:</h1>
<p>If you're only going to be making it for a single day, your site fee will include all meals for that day. Children under 5 are free.<br /> The day trip payment schedule is as follows:</p>
<table cellpadding="0" cellspacing="0" class="daytrip" >
	<tr>
    	<td>Day Trip Fees</td>
        <td>Adults</td>
        <td>Children (5-13)</td>
    </tr>
    <tr>
    	<td>Thursday Only</td>
    	<td class="callout">$14</td>
    	<td class="callout">$8</td>
    </tr>   
    <tr>
    	<td>Friday Only</td>
    	<td class="callout">$17</td>
    	<td class="callout">$9</td>
    </tr>  
    <tr>
    	<td>Saturday Only</td>
    	<td class="callout">$17</td>
    	<td class="callout">$9</td>
    </tr>       
</table> 

<script src="/js/jquery.validate.min.js"></script>
<script>
var adultID="QMBZSEJUCV7NG";
var childID="VZQ6UYAQNBHVJ";

$().ready(function() {
	$('#adultForm').validate();
	$('#childForm').validate();
	
	$('input[name=isChild]').change(function () {
		console.log(this);
		if ($(this).hasClass("yesChild")){
			$('#childForm').show();
			$('#adultForm').hide();
		} else {
			$('#childForm').hide();
			$('#adultForm').show();
		}
	});
	$('#adultForm .admissionType select').change(function(e) {
		$('#adultForm .total').text($('option:selected',this).attr('class'));
    });
	$('#childForm .admissionType select').change(function(e) {
		$('#childForm .total').text($('option:selected',this).attr('class'));
    });
});

</script>
<?php include "../footer.php" ?>