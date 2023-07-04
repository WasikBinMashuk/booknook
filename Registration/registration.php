
<html>
    <head>
        <title> login and registration
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    
     <body>
         <div class="container">
             <div class="card">
                 <div class="inner-box" id="card">
                     <div class="card-front">
                         <h2> LOGIN </h2>
                          <form><input type = "Email" class="input-box" placeholder="Your Email Id" required>
                              <input type = "Password" class="input-box" placeholder="Password" required>
                              <button type = "Submit" class="submit-btn"> Submit </button>
                              <input type="checkbox"><span>Remember me</span>
                         </form>
                         <button type = "button" class="btn" onclick="openRegister()">Don't have an account?</button>
                         <a href="">Forget Password</a>
                              
                     
                     
                     </div>
                     <div class="card-back">
                     
                     <h2> REGISTER </h2>
                          <form><input type = "text" class="input-box" placeholder="Your Name" required>
                              <input type = "Email" class="input-box" placeholder="Your Email Id" required>
                              <input type = "Password" class="input-box" placeholder="Password" required>
                              <input type = "Address" class="input-box" placeholder="Your Adress" required>
                              <input type = "PhoneNumber" class="input-box" placeholder="Your Phone Number" required>
                              <button type = "Submit" class="submit-btn"> Submit </button>
                              <input type="checkbox"><span>Remember me</span>
                         </form>
                         <button type = "button" class="btn" onclick="openLogin()">I've an account</button>
                         <a href="">Forget Password</a>
                     
                     </div>
                 </div>
             </div>
         </div>
        
       
         <script>
             
             var card = document.getElementById("card");
             
             function openRegister(){
                 card.style.transform = "rotateY(-180deg)";
                 }
             
              function openLogin(){
                 card.style.transform = "rotateY(0deg)";
                 }
             
         </script>
         
         
         
</body>    
</html>