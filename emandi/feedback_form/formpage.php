<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feedback Form for GreenBasket</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >

    </head>
    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your feedback below: </p>
                    <form action="feed.php"  role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="rating" id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rating" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rating" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments">FeedBack Description</label>
                                <textarea class="form-control" type="textarea" name="feedback" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="mobileno">Mobile No</label>
                                <input type="mobileno" class="form-control" id="mobileno" name="mobileno" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-warning btn-block" >Post </button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
    </body>
</html>