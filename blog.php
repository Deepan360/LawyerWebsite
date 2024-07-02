<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Blog Cards</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 150px;
            /* Set a fixed height for the images */
            object-fit: cover;
            /* Ensure images cover the area without distortion */
        }

        .card-body {
            padding: 10px;
            /* Reduce padding for smaller card size */
        }

        .card-title {
            font-size: 1.1rem;
            /* Reduce font size */
        }

        .card-text {
            font-size: 0.9rem;
            /* Reduce font size */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Show only 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row mt-2">
            <?php
            include 'db.php';

            // Fetch blog data
            $sql = "SELECT id, title, content, image_url FROM blogs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($count % 3 == 0 && $count != 0) {
                        echo '</div><div class="row mt-2">';
                    }
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="<?php echo $row['image_url']; ?>" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-danger font-weight-bold"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo $row['content']; ?></p>
                                <a href="#" data-toggle="modal" data-target="#modal<?php echo $row['id']; ?>">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?php echo $row['id']; ?>"><?php echo $row['title']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>           
                                </div>
                                <div class="modal-body">
                                    <?php echo $row['content']; ?>
                                </div>
                                <div class="modal-footer">   
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    $count++;
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>