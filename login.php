<!doctype html>
<html lang="en">

<head>
    <title>Golden Rock Adr</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./lawlogo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-danger" href="#"><img src="./lawlogo.jpeg" alt="logo" class="nav-logo">Golden Rock Adr</a>
                <div class="d-flex">
                    <a class="btn btn-outline-danger me-2" href="tel:9150593844">Contact: 9150593844</a>
                    <a class="btn btn-outline-danger" href="mailto:help@goldenrockadr.org">Email: help@goldenrockadr.org</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- required bootstrap js -->
        <button type="submit" name="commit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#login">
          Login/Signup
        </button>
        <div class="modal fade" id="login" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-envelope"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <button type="submit" name="commit" class="btn btn-primary btn-lg btn-block">
                  <span>Login <i class="fa fa-sign-in"></i></span>
                </button>
                <div class="text-center">
                  <a class="" href="" data-dismiss="modal" data-toggle="modal" data-target="#signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="signup" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Signup</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-envelope"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Password confirmation" aria-label="Password confirmation" aria-describedby="basic-addon1">
                </div>
                <button type="submit" name="commit" class="btn btn-primary btn-lg btn-block">
                  <span>Signup <i class="fa fa-sign-in"></i></span>
                </button>
                <div class="text-center">
                  <a class="" href="" data-dismiss="modal" data-toggle="modal" data-target="#login">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
    <footer class="footer  bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <p>&copy; 2024 Golden Rock Adr. All rights reserved.</p>
                    <p>Website developed by <a href="https://www.akilamtechnology.com/" class="text-white">Akilam Technology </a>With &nbsp;<i class="bi bi-heart-fill text-pink"></i></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-lg-end justify-content-center align-items-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="text-white text-decoration-none">Back to top <i class="fas fa-arrow-up"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>