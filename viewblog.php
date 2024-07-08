<?php
// Include the database connection file
require_once 'db.php';

// Initialize an empty array for storing blogs
$blogs = [];

// Fetch blogs from the database
<<<<<<< HEAD
$select_query = "SELECT id, title, content, spotify_link FROM blogs WHERE active = 1 ORDER BY created_at DESC";
=======
$select_query = "SELECT title, content, spotify_link FROM blogs WHERE active = 1 ORDER BY created_at DESC";
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
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
<<<<<<< HEAD
        return substr($content, 0, $last_space) . '... <span class="read-more" data-full-content="' . htmlspecialchars($content) . '">Read more</span>';
=======
        return substr($content, 0, $last_space) . '...';
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Blogs - Golden Rock Adr</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./lawlogo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts: Playfair Display -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&amp;display=swap" rel="stylesheet">
=======
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./lawlogo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
    <style>
        .footer {
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
<<<<<<< HEAD
        .card {
            max-height: auto; /* Allow card to expand vertically */
            overflow: hidden; /* Hide overflow content initially */
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.3);
            border: 1px solid #fff;
            cursor: pointer;
            position: relative; /* Ensure delete icon is positioned correctly */
=======

        .card {

            max-height: 300px;
            height: 250px;
            overflow: hidden;
            /* Hide overflowing content */
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.3);
            border: 1px solid #fff;
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #dc3545;
<<<<<<< HEAD
            margin-bottom: 1rem;
        }

=======
            /* Red color for title */
            margin-bottom: 1rem;
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
        .card-body {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

<<<<<<< HEAD
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

        .delete-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            color: #dc3545;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .row-cols-md-3 .col {
                flex: 0 0 100%;
                max-width: 100%;
            }
=======
        .read-more-content {
            display: none;
            /* Initially hide full content */
        }

        .read-more-btn {
            cursor: pointer;
            color: #007bff;
            /* Blue color for read more button */
            text-decoration: underline;
            align-self: flex-end;
            /* Align button to the right */
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
        }
    </style>
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
<<<<<<< HEAD
        <nav class="navbar navbar-expand navbar-dark bg-danger text-white">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link" href="./blogupload.html">Blog-Upload</a>
                <a class="nav-item nav-link active" href="/viewblog.php">View-Blog</a>
                <a class="nav-item nav-link" href="/index.html">Home</a>
            </div>
        </nav>
    </header>
    <main >
=======
        <nav class="navbar navbar-expand navbar-dark  bg-danger text-white">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link " href="./blogupload.html" aria-current="page">Blog-Upload <span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link active" href="/viewblog.php">View-Blog</a>
                <a class="nav-item nav-link " href="/index.html">Home</a>
            </div>
        </nav>

    </header>
    <main>
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
        <div class="container mt-4">
            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php else : ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($blogs as $blog) : ?>
                        <div class="col">
<<<<<<< HEAD
                            <div class="card">
                                <i class="bi bi-trash delete-icon" onclick="deleteBlog(<?php echo $blog['id']; ?>)"></i>
=======
                            <div class="card ">
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
                                <div class="card-body">
                                    <h5 class="card-title text-danger font-weight-bold"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                    <?php if (!empty($blog['embed_url'])) : ?>
                                        <div class="spotify-embed">
                                            <iframe src="<?php echo htmlspecialchars($blog['embed_url']); ?>" width="100%" height="80" frameborder="1" allowtransparency="true" allow="encrypted-media"></iframe>
                                        </div>
                                    <?php endif; ?>
<<<<<<< HEAD
                                    <div class="card-content truncated-text" onclick="toggleText(this)">
                                        <?php echo htmlspecialchars($blog['content']); ?>
                                    </div>
=======
                                    <div class="card-content">
                                        <?php echo htmlspecialchars($blog['short_content']); ?> <!-- Show shortened content -->
                                        <div class="read-more-content">
                                            <?php echo htmlspecialchars($blog['content']); ?> <!-- Full content -->
                                        </div>
                                    </div>
                                    <?php if (strlen($blog['content']) > 200) : ?>
                                        <p class="read-more-btn text-primary">Read More</p>
                                    <?php endif; ?>
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
<<<<<<< HEAD
=======

>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
    <footer>
        <div class="footer bg-dark text-white">
            This web page is developed by Akilam Technology 🌏
        </div>
    </footer>

    <!-- Bootstrap JavaScript Bundle with Popper -->
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQ+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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

        function deleteBlog(blogId) {
            if (confirm('Are you sure you want to delete this blog?')) {
                // Send AJAX request to delete the blog
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_blog.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        location.reload(); // Reload the page after successful deletion
                    } else {
                        alert('Failed to delete the blog.');
                    }
                };
                xhr.send('id=' + blogId);
            }
        }
=======
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var readMoreBtns = document.querySelectorAll('.read-more-btn');

            readMoreBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var cardBody = this.closest('.card-body');
                    var readMoreContent = cardBody.querySelector('.read-more-content');

                    // Toggle visibility of full content
                    readMoreContent.style.display = 'block';
                    this.style.display = 'none'; // Hide "Read More" button
                });
            });
        });
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
    </script>
</body>

</html>

<<<<<<< HEAD
<?php
// Close the database connection
mysqli_close($conn);
?>
=======


<?php
// Close the database connection
mysqli_close($conn);
?>
>>>>>>> 298b38066a84250bbfec73225c8b096a6580fb85
