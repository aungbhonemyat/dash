<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style> 
        .wrap{
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style> 
</head>
<div class="container">
    <img src="img/glass-brand.png" width="300px" alt="">
</div>
<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Admin Login </h1>

        <?php if(isset($_GET['incorrect'])):?>
            <div class="alert alert-warning bg-danger text-white">Incorrect Email and Password</div>
        <?php endif ?>

        <form action="login.php" method="post">
            <input type="email" name="email" class="form-control mb-3"placeholder="Email" required >
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" class="w-100 btn btn-dark btn-lg">Login</button>
        </form>
    </br>
        
    </div>
    
</body>
</html>