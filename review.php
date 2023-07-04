<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>BoiHat</title>
        <link rel="stylesheet" href="customCSS/review_style.css">
        <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    </head>
    <body>
        
        <div class="contain">
            
                <div class="post">
                    <div class="text">Thanks for rating us!
                    </div>
                    <div class="edit">EDIT</div>
                </div>
            
            
                <div class="rate">
                <input type="radio" name="rate" id="rate-1">
                <label for="rate-1" ></label>
                <input type="radio" name="rate" id="rate-2">
                <label for="rate-2" ></label>
                <input type="radio" name="rate" id="rate-3">
                <label for="rate-3" ></label>
                <input type="radio" name="rate" id="rate-4">
                <label for="rate-4" ></label>
                <input type="radio" name="rate" id="rate-5">
                <label for="rate-5" ></label>
                <form action="addReviewCode.php" method="POST">
                    <header></header>
                    <div class="textarea">
                        <textarea name="post" cols="40" placeholder="Describe your experience.."></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit" name="submitPost">post</button>
                    </div>
                </form>
                    
                

            </div>
        </div>
    </body>

</html>
