<!doctype html>
<html lang="en">

<head>
    <title>Golden Rock Adr - Create Blog Post</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./lawlogo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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
    <main class="container mt-4">
        <!-- Blog Post Form -->
        <h2>Create Blog Post</h2>
        <form action="create_post.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="spotifyLink" class="form-label">Spotify Link:</label>
                <input type="url" class="form-control" id="spotifyLink" name="spotify_link" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </main>
    <footer class="footer bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <p>&copy; 2024 Golden Rock Adr. All rights reserved.</p>
                    <p>Website developed by <a href="https://www.akilamtechnology.com/" class="text-white">Akilam Technology</a> With &nbsp;<i class="bi bi-heart-fill text-pink"></i></p>
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