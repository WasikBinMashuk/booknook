<?php
include "connect.php";
include "myFunctions.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <html>
    <head>
        <title> RENTING FORM
        </title>
        <link rel="stylesheet" href="customCSS/rentstyle.css">
    </head>
   
     <body>
         <div class="container">
             <div class="card">
                 <div class="inner-box" id="card">
                     <div class="card-front">
                         <h2> Rent Your Desire Books </h2>
                          <form><input type = "Name" class="input-box" placeholder="Your Name" required>
                              <input type = "Email" class="input-box" placeholder="Your Email Id" required>
                              <input type = "Address" class="input-box" placeholder="Address" required>
                              <div class="select">
                              <select name="format" id="format">
                                  <option selected disabled>
                                  How many day you want for rent?
                                  </option>
                                  <option value="txt"> One Day</option>
                                  <option value="txt"> Two Days</option>
                                  <option value="txt"> Three Days</option>
                                  <option value="txt"> Four Days</option>
                                  <option value="txt"> Five Days</option>
                                  <option value="txt"> Six Days</option>
                                  <option value="txt"> Seven days</option>
                                  
                                  </select>
                              </div>
                        
                              <input type = "Phone Number" class="input-box" placeholder="Phone Number" required>
                              <button type = "Submit" class="submit-btn"> Submit </button>
                              <button type = "Payment" class="Payment"> Make Payment</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         
</body>    
</html>