
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kalam&family=Rancho&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
<link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/addcustomer.css">
</head>

<body>
    <script>

        function checkingEqual() {
            var a = document.getElementById("myInput1").value;
            var b = document.getElementById("myInput2").value;
            if (a != b ) {
                document.getElementById("messagequal").innerHTML = "** Password and Confirm password are not matching.";
                return false;
            }
        }
        function update()
        {
            var westbengal=["Kolkata", "Darjeeling", "Naihati", "Kalyani","Srerampore", "Kanchrapara", "Asansol", "Durgapur","Midnapore", "Kharagpur", "Barackpore", "Kalyani","Howrah"];
            var rajasthan=["Jaipur", "Jodhpur","Chittorgar", "Banswara", "Dungarpur", "Dausa","Shrimadhopore", "Sanchore", "Anupgar","Sri Ganganagar","Pushkar"];
            var panjab=["Amritsar", "Ludhiana", "Jalandhar","Patiala","Chandigarh", "Pathankot", "Bathinda", "Gurdaspur","Khanna"];
            var gujrat=["Ahmedabad", "Rajkot", "Surat", "Vadodara","Gandhinagar", "Jamnagar", "Junagadh", "Patan","Anand", "Dudhrej", "Valsad","Bardoli","Himatnagar"];
            var arunachalpradesh=["Itanagar", "East Siang", "Roing", "Tezu","Naharlagun"];
            var kerala=["Kochi", "Thiruvananthapuram", "Kollam", "Thrissur","Kannur","Kozhikode","Thalassery","Manjeri","Ponnani"];
            var maharashtra=["Mumbai", "Pune", "Aurangabad", "Kolhapur","Solapur","Nashik","Amravati","Vasai-Virar","Thane","Satare"];
            
            var countries=document.getElementById("country");
            var cities=document.getElementById("city");
            var selected=countries.value;
            var html='<option selected="selected">Select City</option>';
            if(selected === "West-Bengal")
            {
                for(var i=0; i < westbengal.length; i++)
                {
                    html+='<option value="' + westbengal[i] + '">' + westbengal[i] + '</option>';
                }
            }
            else if(selected === "Rajasthan")
            {
                for(var j=0; j < rajasthan.length; j++)
                {
                    html+='<option value="' + rajasthan[j] + '">' + rajasthan[j] + '</option>';
                }
            }
            else if(selected === "Panjab")
            {
                for(var k=0; k < panjab.length; k++)
                {
                    html+='<option value="' + panjab[k] + '">' + panjab[k] + '</option>';
                }
            }
            else if(selected === "Gujrat")
            {
                for(var l=0; l < gujrat.length; l++)
                {
                    html+='<option value="' + gujrat[l] + '">' + gujrat[l] + '</option>';
                }
            }
            else if(selected === "Arunachal-Pradesh")
            {
                for(var m=0; m < arunachalpradesh.length; m++)
                {
                    html+='<option value="' + arunachalpradesh[m] + '">' + arunachalpradesh[m] + '</option>';
                }
            }
            else if(selected === "Kerala")
            {
                for(var n=0; n < kerala.length; n++)
                {
                    html+='<option value="' + kerala[n] + '">' + kerala[n] + '</option>';
                }
            }
            else if(selected === "Maharashtra")
            {
                for(var p=0; p < maharashtra.length; p++)
                {
                    html+='<option value="' + maharashtra[p] + '">' + maharashtra[p] + '</option>';
                }
            }
            cities.innerHTML=html;
        }
    </script>
    <style>
        body {
            background-image: url("images/signup_cover.jpg");
        }
    </style>

    <body>
        <div class="wrapper">
            <form class="form" onsubmit="return checkingEqual()" action="signup.php" method="post">
                <div class="waviy">
                    <center>
                        <span style="--i:1">S</span>
                        <span style="--i:2">I</span>
                        <span style="--i:3">G</span>
                        <span style="--i:4">N</span>
                        <span style="--i:5">_</span>
                        <span style="--i:6">U</span>
                        <span style="--i:7">P</span>
                    </center>
                </div>
                <div class="register">
						<p>Already have an account ? &nbsp;&nbsp; <a href="login.php">Login</a></p>
					</div>
                <table>
                    <td>
                        <input type="text" class="formEntry" name="first_name" style="height: 3.8em" placeholder="First Name" required />
                        <input type="text" class="formEntry" name="last_name" style="height: 3em" placeholder="Last Name" required />
                        <input type="text" class="formEntry" name="mailid" placeholder="Email Id" required />
                        <div class="inputbox"><ion-icon name="eye-off" onclick="showPass()"></ion-icon><input type="password"class="formEntry" name="password"id="myInput1" placeholder="Password"/></div><span id="messagequal" style="color:white;font-size:18px;font-weight:400;background:red;"></span>
                        <div class="inputbox"><ion-icon name="eye-off" onclick="showConfirmPass()"></ion-icon><input type="password" class="formEntry" name="confirm_password" id="myInput2"placeholder="Confirm Passord"required/></div><span style="color:white;font-size:18px;font-weight:400;background:green;">Must be within 5-12 Characters.</span>

                    </td>
                    <td>
                        <input type="text" class="formEntry" name="mobile_no" placeholder="Contact No" required />
                        <input type="text" class="formEntry" name="address_line1" placeholder="Address Line1" style="height: 3em" required />
                        <input type="text" class="formEntry" name="address_line2" placeholder="Address Line2" required />
                        <p>
                            <select  type="text" class="formEntry" id="country" name="state" onchange="update()" style="height: 3em;color: rgb(52, 156, 160); opacity: 0.9;font-family: Palatino;font-size: 18px;" required>
                                <option selected="selected" style="color:bisque">State</option>
                                <option value="West-Bengal" style="color:bisque">West-Bengal</option>
                                <option value="Rajasthan" style="color:bisque">Rajasthan</option>
                                <option value="Panjab" style="color:bisque">Panjab</option>
                                <option value="Gujrat" style="color:bisque">Gujrat</option>
                                <option value="Arunachal-Pradesh" style="color:bisque">Arunachal Pradesh</option>
                                <option value="Kerala" style="color:bisque">Kerala</option>
                                <option value="Maharashtra" style="color:bisque">Maharashtra</option>
                            </select>
                        </p>
                        <p>
                            <select  type="text" class="formEntry" id="city" name="city" style="height: 3em;color:rgb(52, 156, 160); opacity: 0.9;font-family: Palatino;font-size: 18px" required>
                                <option selected="selected">City</option>
                            </select>
                        </p>
                        <input type="text" class="formEntry" name="pincode" placeholder="Pincode" required />
                    </td>
                </table>
                <input type="checkbox" class="termsConditions" value="Term" required />
                <label class="container"style="color: white;padding-left: 80px; font-family: 'Lugrasimo', cursive; font-size: 1em;font-weight:600;text-shadow:1px 1px black;">* I Accept the </span><a href="terms.php"><span style="color:black;background:#ff0000;border-radius:10px;font-weight:600;margin:6px;padding:3px">Terms of Use</span></a><span style="color: white"> &</span>
                    <span  style="color:black;background:#ff0000;border-radius:10px;font-weight:600;margin:6px;padding:3px;"><a href="terms.php">Privacy Policy</span></a></label><br>

                <table>
                    <tr>
                <td><input type="submit" class="submit"value="Register"  name="register" ></td>
                <td><input type="reset" class="submit"value="Reset" name="reset"/></td>
    </tr>
    </table>

            </form>
        </div>

    </body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
function showPass() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function showConfirmPass() {
  var y = document.getElementById("myInput2");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
</script>
</body>

</html>