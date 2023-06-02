<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Klinik</title>
    <script type="text/javascript" src="ajax.js"></script>  
</head>

<body style="padding: 40px;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <h3 class="text-center text-secondary">Klinik Kecantikan BeautyHope</h3>
        <div class="col-md-6 col-lg-4 mt-3">
            <div class="card mt-3">
                <div class="card-header text-center text-secondary pt-3">
                    <h5>USER LOGIN</h5>
                </div>
                <div class="card-body">
                    <form action="core/database/login_check.php" method="POST" class="my-3">
                        <div class="form-group">
                            <label class="text-secondary">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group mt-1">
                            <label class="text-secondary">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="mt-3" align="center">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
