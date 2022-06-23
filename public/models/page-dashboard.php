<?php
include 'connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>UAS PWEB - Nur Muhammad Himawan</title>
    <style>
        .width-pct {
            width: 15%;
        }
    </style>
</head>

<body>

    <div class="shadow-sm bg-body rounded">
        <nav class="navbar navbar-expand-lg mt-1 ">
            <div class="container-fluid">
                <a class="mx-4" href="index.html">
                    <img src="../asset/img/logo.png" alt="logo" class="navbar-brand">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="page-event.php">All Event</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="page-dashboard.php">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container py-5">
        <div class="row mb-3">
            <div class="col-lg-8">
                <h3>Data List All Event</h3>
            </div>
            <div class="col-lg-4">
                <a href="form-add-concert.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus-circle"></i> Add New</a>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <table class="table table-hover">
                    <thead class="table table-light">
                        <tr>
                            <th>Concert Name</th>
                            <th>Artist</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Country</th>
                            <th class="width-pct">Action</th>
                        </tr>
                    </thead>
                    <tbody id="concert">
                        <?php
                        $sql = "SELECT * FROM concert INNER JOIN artist ON concert.artist_id = artist.artist_id";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?= $row['concert_name'] ?></td>
                                    <td><?= $row['artist_name'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['date'] ?></td>
                                    <td><?= $row['venue'] ?></td>
                                    <td><?= $row['country'] ?></td>
                                    <td>
                                        <a href='formconcert.php?action=update&id=<?= $row['concert_id'] ?>' class='btn btn-outline-primary btn-sm mr-3'><i class='fa-solid fa-edit'></i> Ubah</a>
                                        <a href='#' class='btn btn-outline-danger btn-sm btn-delete' data-id='<?= $row['concert_id'] ?>'><i class='fa-solid fa-trash'></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            endwhile;
                        } else {
                            echo "<tr>";
                            echo "<td colspan='3'>0 results</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '#search', function() {
                var sort = $('#sort').val();

                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: {
                        sort: sort
                    },
                    success: function(response) {
                        $('#concert').html(response);
                    }
                });
            });

            $(document).on('click', '.btn-delete', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: 'concert.php?action=delete',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data berhasil dihapus');
                        window.location.href = 'page-dashboard.php';
                    }
                });
            });
        });
    </script>
</body>

</html>