<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Form Validation</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<script type="text/javascript">
			/*
			function totalFunction()
			{
				var p = document.getElementById('piccolo').checked;
				var s = document.getElementById('saxophone').checked;
				var t = document.getElementById('trumpet').checked;
				var c = document.getElementById('cymbals').checked;        
				var total = 0.00;

				if (p)
				{
					total = total + 582.00;
				}

				if (s)
				{
					total = total + 2179.00;
				}

				if (t)
				{
					total = total + 99.00;
				}

				if (c)
				{
					total = total + 569.00;
				}

				total = total.toString();
				total = "$" + total; 

				document.getElementById("total").value = total;
			}
			*/
			function validate()
			{
				var fName = document.getElementById('firstName').value;
				var lName = document.getElementById('lastName').value;
				var address = document.getElementById('address').value;
				var city = document.getElementById('city').value;
				var state = document.getElementById('state').value;
				var zip = document.getElementById('zipcode').value;
				var ext = document.getElementById('ext').value;
				var areaCode = document.getElementById('areacode').value;
				var middleThree = document.getElementById('middleThree').value;
				var lastFour = document.getElementById('lastFour').value;
				var fq = document.getElementById('firstQuarter').value;
				var sq = document.getElementById('secondQuarter').value;
				var tq = document.getElementById('thirdQuarter').value;
				var lq = document.getElementById('lastQuarter').value;
				var month = document.getElementById('month').value;
				var year = document.getElementById('year').value;        

				zip = zip.toString();

				areaCode = areaCode.toString();
				middleThree = middleThree.toString();
				lastFour = lastFour.toString();

				var phoneNumber = areaCode + middleThree + lastFour;
				/*
				fq = fq.toString();
				sq = sq.toString();
				tq = tq.toString();
				lq = lq.toString();

				month = month.toString();
				year = year.toString();
		
				var cardNumber = fq + sq + tq + lq; 
				var eDate = month + "/" + year;
				*/
				var first = true;
				var last = true;
				var add = true;
				var cit = true;
				var st = true;
				var zCode = true;
				var phone = true;
				/*
				var card = true;
				var date = true;
				*/
				var message = "";

				if (fName == "") 
				{
					first = false;
					message =  message + "First name  ";
				}

				if (lName == "") 
				{
					last = false;
					message = message + "Last name  ";
				}

				if (address == "") 
				{
					add = false;
					message = message + "Address  ";
				}

				if (city == "") 
				{
					cit = false;
					message = message + "City  ";
				}

				if (state == "") 
				{
					st = false;
					message = message + "State  ";
				}

				if (zip.length < 5)
				{
					zip = "";
				}

				if ((isNaN(zip)) || (zip == "")) 
				{
					zCode = false; 
					message = message + "Zipcode  ";
				}
				else
				{
					if (ext != "")
					{
						ext = ext.toString();

						zip = zip + "-" + ext;
					}
				}

				if (areaCode.length < 3)
				{
					areaCode = "";
				}

				if (middleThree.length < 3)
				{
					middleThree = "";
				}

				if (lastFour.length < 4)
				{
					lastFour = "";
				}

				if (((isNaN(areaCode)) || (areaCode == "")) || ((isNaN(middleThree)) || (middleThree == "")) || ((isNaN(lastFour)) || (lastFour == ""))) 
				{
					phone = false; 
					message = message + "Phone Number  ";
				}
				/*
				if (fq.length < 4)
				{
					fq = "";
				}

				if (sq.length < 4)
				{
					sq = "";
				}

				if (tq.length < 4)
				{
					tq = "";
				}

				if (lq.length < 4)
				{
					lq = "";
				}

				if (((isNaN(fq)) || (fq == "")) || ((isNaN(sq)) || (sq == "")) || ((isNaN(tq)) || (tq == "")) || ((isNaN(lq)) || (lq == ""))) 
				{
					card = false; 
					message = message + "Card Number  ";
				}

				if (month.length < 2)
				{
					month = "";
				}

				if (year.length < 4)
				{
					year = "";
				}

				if (((isNaN(month)) || (month == "")) || ((isNaN(year)) ||(year == ""))) 
				{
					date = false; 
					message = message + "Expiration Date";
				}
				*/
				if (!(first) || !(last) || !(add) || !(cit) || !(st) || !(zCode) || !(phone) /*|| !(card) || !(date)*/)  
				{
					alert("Please refill in the following fields: " + message)

					if (!(first))
					{
						document.getElementById('firstName').focus;
					}
					else if (!(last))
					{
						document.getElementById('lastName').focus;
					}
					else if (!(add))
					{
						document.getElementById('address').focus;
					}
					else if (!(cit))
					{
						document.getElementById('city').focus;
					}
					else if (!(st))
					{
						document.getElementById('state').focus;
					}
					else if (!(zCode))
					{
						document.getElementById('zipcode').focus;
					}
					else if (!(phone))
					{
						document.getElementById('areacode').focus;
					}
					/*
					else if (!(card))
					{
						document.getElementById('firstQuarter').focus;          
					}
					else if (!(date))
					{
						document.getElementById('month').focus;
					}
					*/
					return false;
				}
				else
				{
					return true;
				} 
			}
		</script>
	</head>
	<body>
		<h1>Instrument Selection</h1>  
		<form id="form1" action="checkOut.php" onsubmit="return validate()" method="POST">
			<p>  
				<table>
					<tr>
						<td colspan="5"> First name: </td>
					</tr>        
					<tr>
						<td colspan="5"><input type="text" id="firstName" size="25" required></td>
					</tr>
					<tr>
						<td colspan="5"> Last name: </td>
					</tr>
					<tr>
						<td colspan="5"><input type="text" id="lastName" size="25" required></td>
					</tr>
					<tr>
						<td colspan="5"> Street Address: </td>
						<td> City: </td>
						<td> State: </td>
						<td> Zipcode: </td>
						<td> </td>
						<td> Extension: </td>
					</tr>
					<tr>
						<td colspan="5"><input type="textarea" id="address" rows="1" cols="50" size="25" required></td>                                                                 
						<td><input type="textarea" id="city" rows="1" cols="30" size="20" required></td>                                                                 
						<td><input type="textarea" id="state" rows="1" cols="15" size="15" required></td>                                                                 
						<td><input type="textarea" id="zipcode" rows="1" cols="5" size="5" maxlength="5" required></td>
						<td> - </td>
						<td><input type="textarea" id="ext" rows="1" cols="4" size="4" maxlength="4"></td>
					</tr>
					<tr>
						<td colspan="3"> Phone Number: </td>
					</tr>
					<tr>
						<td><input type="textarea" id="areacode" rows="1" cols="3" size="3" maxlength="3" required></td>
						<td> - </td>
						<td><input type="textarea" id="middleThree" rows="1" cols="3" size="3" maxlength="3" required></td>
						<td> - </td>
						<td><input type="textarea" id="lastFour" rows="1" cols="4" size="4" maxlength="4" required></td>
					</tr>
				</table>  
			</p>      
			<table>
				<th colspan="3">Item</th>
				<th>Price</th>
				<tr>
					<td>
						<input type="checkbox" id="piccolo" name="item[]" value="Jupiter 330S Piccolo" onclick="totalFunction()">
					</td>
					<td><img src="Piccolo.jpg" alt="Jupiter 330S Piccolo" width="100" height="75"></td>
					<td> Jupiter 330S Piccolo </td>
					<td> $582.00 </td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" id="saxophone" name="item[]" value="Yamaha YTS-475 Intermediate Tenor Saxophone" onclick="totalFunction()">
					</td>
					<td><img src="Saxophone.jpg" alt="Tenor Saxophone" width="100" height="113"></td>
					<td>
						Yamaha YTS-475                                                        <br/>
						Intermediate                                                          <br/> 
						Tenor Saxophone 																		 <br/>
					</td>
					<td> <br/> $2,179.00 </td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" id="trumpet" name="item[]" value="Etude ETR-100 Series B♭ Trumpet" onclick="totalFunction()">
					</td>
					<td><img src="Trumpet.jpg" alt="Trumpet" width="100" height="33"></td>
					<td> 
						Etude ETR-100 Series                                                  <br/>
						Student B&#x266D; Trumpet
					</td>
					<td> <br/> $99.00 </td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" id="cymbals" name="item[]" value="Sambian Xs20 Cymbals Super Set with Free 10\" Splash & 18\" Crash" onclick="totalFunction()">
					</td>
					<td><img src="Cymbals.jpg" alt="Cymbals" width="100" height="83"></td>
					<td>
						Sambian Xs20 Cymbals                                                  <br/> 
						Super Set with Free                                                   <br/>
						10" Splash & 18" Crash 																 <br/>
					</td>
					<td> <br/> $569.00 </td>
				</tr>
			</table>
			<!--
			<div>
				<h3>Select Payment Type</h3>                                                 
				<input type="radio" name="visa"> Visa                                       <br/>
				<input type="radio" name="mastercard"> MasterCard                           <br/>
				<input type="radio" name="amex"> American Express                           <br/>
			</div>
			-->	 
			<p>
				<table>
					<!--
					<tr>
						<td colspan="3"> Card Number: </td>
					</tr>
					<tr>
						<td><input type="textarea" id="firstQuarter" rows="1" cols="4" size="4" maxlength="4" required></td>
						<td><input type="textarea" id="secondQuarter" rows="1" cols="4" size="4" maxlength="4" required></td>
						<td><input type="textarea" id="thirdQuarter" rows="1" cols="4" size="4" maxlength="4"  required></td>
						<td><input type="textarea" id="lastQuarter" rows="1" cols="4" size="4" maxlength="4" required></td>
					</tr>
					<tr>           
						<td colspan="3"> Card Expiration Date: </td>
					</tr>
					<tr>
						<td><input type="textarea" id="month" rows="1" cols="2" size="2" maxlength="2" required> &nbsp;<b>/</b></td>
						<td><input type="textarea" id="year" rows="1" cols="4" size="4" maxlength="4" required></td>
					</tr>
					<tr>
						<td colspan="3"> Total: </td>
					</tr>
					-->
					<tr>
						<td colspan="3"> Total: </td> 
					</tr>
					<tr>
						<td colspan="3"><input type="textarea" id="total" rows="1" cols="7" size="7" readonly></td>
					</tr>
				</table>
			</p> 
			<p>   
				<button type="reset"> Reset </button>
				<button type="submit" onclick="validate()"> Submit </button>
			</p>
		</form> 
	</body>
</html>