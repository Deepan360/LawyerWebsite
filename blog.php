<?php
// Include the database connection file
require_once 'db.php';

// Initialize an empty array for storing blogs
$blogs = [];

// Fetch blogs from the database
$select_query = "SELECT title, content, spotify_link FROM blogs WHERE active = 1 ORDER BY created_at DESC";
$result = mysqli_query($conn, $select_query);

// Check if there are any blogs retrieved
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract track ID from Spotify link
        $spotify_link = $row['spotify_link'];
        $track_id = extractTrackID($spotify_link);

        // Construct embeddable Spotify URL
        $embed_url = "https://open.spotify.com/embed/track/" . $track_id;

        // Add to blogs array
        $row['embed_url'] = $embed_url;
        $row['short_content'] = shortenContent($row['content']); // Truncate content for preview
        $blogs[] = $row;
    }
} else {
    $error_message = "No blogs found.";
}

// Function to extract track ID from Spotify link
function extractTrackID($spotify_link)
{
    // Remove any potential trailing slashes or spaces
    $spotify_link = trim($spotify_link, "/ ");

    // Check if the link starts with 'https://open.spotify.com/track/'
    if (strpos($spotify_link, 'https://open.spotify.com/track/') === 0) {
        // Extract the track ID from the HTTPS Spotify link format
        $start_pos = strlen('https://open.spotify.com/track/');
        $track_id = substr($spotify_link, $start_pos);
    } elseif (strpos($spotify_link, 'http://open.spotify.com/track/') === 0) {
        // Extract the track ID from the HTTP Spotify link format
        $start_pos = strlen('http://open.spotify.com/track/');
        $track_id = substr($spotify_link, $start_pos);
    } else {
        // Handle unexpected formats or invalid links
        $track_id = null; // or handle error condition
    }

    // Remove any query string or additional parameters
    $end_pos = strpos($track_id, '?');
    if ($end_pos !== false) {
        $track_id = substr($track_id, 0, $end_pos);
    }

    return $track_id;
}

// Function to shorten content for preview
function shortenContent($content, $max_length = 200)
{
    if (strlen($content) <= $max_length) {
        return $content;
    } else {
        // Find the last space within the limit
        $last_space = strrpos(substr($content, 0, $max_length), ' ');
        return substr($content, 0, $last_space) . '... <span class="read-more" data-full-content="' . htmlspecialchars($content) . '">Read more</span>';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Golden Rock Adr - Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./lawlogo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS v5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- Google Fonts: Playfair Display -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap"
        rel="stylesheet">

<style>
<<<<<<< HEAD
        .card {
        max-height: auto; /* Allow card to expand vertically */
        overflow: hidden; /* Hide overflow content initially */
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.3);
        border: 1px solid #fff;
        cursor: pointer;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #dc3545;
        margin-bottom: 1rem;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-content {
        white-space: nowrap; /* Truncate content */
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer; /* Indicates that the text is clickable */
    }

    .expanded-text {
        white-space: normal; /* Display full content */
        overflow: visible;
        cursor: default; /* Indicates that the text is no longer clickable */
    }

    .spotify-embed {
        margin-bottom: 10px;
    }
=======
 .card-img-top {
            width: 100%;
            height: 150px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure images cover the area without distortion */
        }
        .card-body {
            padding: 10px; /* Reduce padding for smaller card size */
        }
        .card-title {
            font-size: 1.1rem; /* Reduce font size */
        }
        .card-text {
            font-size: 0.9rem; /* Reduce font size */
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Show only 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
</style>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-danger" href="#"><img src="./lawlogo.jpeg" alt="logo"
                        class="nav-logo">Golden Rock Adr</a>
                <div class="d-flex">
                    <a class="btn btn-outline-danger me-2" href="tel:9150593844">Contact: 9150593844</a>
                    <a class="btn btn-outline-danger" href="mailto:help@goldenrockadr.org">Email:
                        help@goldenrockadr.org</a>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="./index.html" aria-current="page">Home <span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " href="./blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./team.html">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./services.html">Services</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Team & Services</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="./team.html">Team</a>
                                    <a class="dropdown-item" href="./services.html">Services</a>
                                </div>
                            </li>  -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<main class="container">
    <div class="row mb-0 mt-1">
        <div class="col">
            <div class="blog-post">
                <h2 class="blog-post-title"><i class="fa fa-solid fa-podcast" aria-hidden="true">Podcast</i></h2>
                <p class="blog-post-meta"> by <a href="#">Golden Rock Adr</a></p>
                <div class="row mt-4">
                    <div class="col">
                        <iframe src="https://open.spotify.com/embed/show/6LvQjJdW5RZPEpPwsbEDBi" width="100%"
                            height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <h2>Explore the latest happenings in the art and culture world with our curated articles.</h2>
        </div>
    </div>
<<<<<<< HEAD
    <div class="container mt-4 mb-4">
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php else : ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($blogs as $blog) : ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-danger font-weight-bold"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                <?php if (!empty($blog['embed_url'])) : ?>
                                    <div class="spotify-embed">
                                        <iframe src="<?php echo htmlspecialchars($blog['embed_url']); ?>" width="100%" height="80" frameborder="1" allowtransparency="true" allow="encrypted-media"></iframe>
                                    </div>
                                <?php endif; ?>
                                <div class="card-content truncated-text" onclick="toggleText(this)">
                                    <?php echo htmlspecialchars($blog['content']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
=======
<div class="container mt-4">
    <?php if (!empty($error_message)) : ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $error_message; ?>
    </div>
<?php else : ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($blogs as $blog) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-danger font-weight-bold"><?php echo htmlspecialchars($blog['title']); ?></h5>
                        <?php if (!empty($blog['embed_url'])) : ?>
                            <div class="spotify-embed">
                                <iframe src="<?php echo htmlspecialchars($blog['embed_url']); ?>" width="100%" height="80" frameborder="1" allowtransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        <?php endif; ?>
                        <div class="card-text">
                            <?php echo shortenContent($blog['content']); ?>
                            <?php if (strlen($blog['content']) > 200) : ?>
                                <span class="read-more" onclick="toggleText(this)" data-full-content="<?php echo htmlspecialchars($blog['content']); ?>">Read more</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
</div>
</main>


    <footer class="footer bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <p>&copy; 2024 Golden Rock Adr. All rights reserved.</p>
                    <p>Website developed by <a href="https://www.akilamtechnology.com/"
                            class="text-white">Akilam Technology </a>With &nbsp;<i
                            class="bi bi-heart-fill text-pink"></i></p>
                </div>
                <div
                    class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-lg-end justify-content-center align-items-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#"
                                class="text-white text-decoration-none">Back to top <i
                                    class="fas fa-arrow-up"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
   <!-- Modals and JavaScript libraries (Bootstrap, jQuery) -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
       crossorigin="anonymous"></script>

<<<<<<< HEAD
       <script>
     function toggleText(element) {
        if (element.classList.contains('truncated-text')) {
            element.classList.remove('truncated-text');
            element.classList.add('expanded-text');
        } else {
            element.classList.remove('expanded-text');
            element.classList.add('truncated-text');
        }
    }
</script>
=======
   <script>
       // JavaScript function to toggle text between truncated and full content
       function toggleText(element) {
           if (element.classList.contains('truncated-text')) {
               element.classList.remove('truncated-text');
               element.classList.add('expanded-text');
           } else {
               element.classList.remove('expanded-text');
               element.classList.add('truncated-text');
           }
       }
   </script>
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
