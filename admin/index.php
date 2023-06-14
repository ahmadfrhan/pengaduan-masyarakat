<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-lg shadow d-flex justify-content-center position-absolute top-50 start-50 translate-middle" style="width: 70%;">
        <div class="left row p-5" style="width: 110rem">
            <img src="../img/hero_admin2.png" class="img-fluid">
        </div>
        <div class="right container row d-flex justify-content-center">
            <div class="form card border-0 align-self-center">
                <div class="card border-0 border-bottom mb-3">
                    <h1 class="fw-bold fs-2">Admin/Petugas</h1>
                </div>
                <form action="../ceklogin.php" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label mx-0">Username :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" autocomplete="off">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label mx-0">Password :</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="button mt-5 d-flex justify-content-between">
                        <button type="submit" class="btn btn-danger w-50">Login</button>
                    </div>
                  </form>
              </div>
        </div>
    </div>
    <footer class="position-absolute bottom-0 start-50 translate-middle-x">
    <p class="fs-6">Created by Ahmad Farhan</p>
        </footer>
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>