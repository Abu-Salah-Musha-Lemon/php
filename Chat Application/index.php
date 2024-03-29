<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat app</header>
            <form action="" enctype="multipart/form-data">
                <div class="error_txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" id="" placeholder="First Name">
                    </div>

                    <div class="field input">
                        <label for="">last Name</label>
                        <input type="text" name="lname" id="" placeholder="last Name">
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Adderess</label>
                    <input type="email" name="email" id="" placeholder="Enter your email">
                </div>

                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Enter your password">
                </div>

                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image">
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="Continue to chat">
                </div>


            </form>
            <div class="link">Already Signed up? <a href="http://">Login Now</a></div>
        </section>
    </div>

    <script src="./javascript/pass-show-hide.js"></script>
    <script src="./javascript/signup.js"></script>
</body>

</html>