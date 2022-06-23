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

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Haloo, Mawann</title>
    <style>
        .card-content {
            filter: brightness(0.8);
            transition: all 300ms;
        }

        .card-content:hover {
            filter: brightness(1);
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
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <header class="container mt-4">
        <div class="text-center py-3 mb-4 border-bottom">
            <h3>All Event</h3>
        </div>
    </header>

    <header class="container">
        <div class="py-3 mb-4 border-bottom">
            <!-- side for sorting and filter -->
            <div class="col">
                <form class="row gx-2 d-flex">
                    <!-- sorting -->
                    <div class="card col-4">
                        <div class="card-header fw-bold">
                            <span class="bi bi-sort-alpha-up me-2"></span>Sorting
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sort">Sort Results By</label>
                                <select class="form-select" id="sort" name="sort">
                                    <option value="date ASC" selected>Date Ascending</option>
                                    <option value="date DESC">Date Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- filtering -->
                    <div class="card col-8">
                        <div class="card-header fw-bold">
                            <span class="bi bi-funnel-fill me-2"></span>Filters
                        </div>
                        <div class="card-body">
                            <div class="col">
                                <div class="row gx-2">
                                    <div class="form-group col-4">
                                        <label for="concert_name">Concert Name</label>
                                        <input type="text" class="form-control" name="concert_name" id="concert_name" placeholder="Concert Name">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="artist">Artist Name</label>
                                        <input type="text" class="form-control" name="artist" id="artist" placeholder="Artist Name">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary mt-3" id="search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!-- pagination -->
    <div class="container">
        <div class="row mt-4" id="concert"></div>
        <div class="d-grid mb-4" id="pagination">
            <button type="button" class="btn btn-primary" id="btnLoad">Load More</button>
        </div>
    </div>
    <!-- end pagination -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            let page = 0;

            $('#btnLoad').on('click', function() {
                $.get('concert.php?page=' + page, function(data) {
                    $.each(data, function(i, item) {
                        $('#concert').append(`<div class="col-xl-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="${item.image}" class="card-img-top card-content" alt="artwork">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <a href="detail.php?" id="${item.concert_id}" class ="text-decoration-none fw-bold fs-6 fw-bolder"> ${item.concert_name} </a>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <span>Date: ${item.date}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <span>Location: ${item.venue}, ${item.country}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                    });
                    page += 6;

                    $('#btnLoad').html('<i class="fa-solid fa-check-circle"></i> Load More');
                });
            }).trigger('click');

            $(document).on('click', '#search', function() {
                var sort = $('#sort').val();
                var concert_name = $('#concert_name').val();
                var artist = $('#artist').val();
                var country = $('#country').val();

                $.ajax({
                    url: 'concert.php?action=search',
                    type: 'POST',
                    data: {
                        sort: sort,
                        concert_name: concert_name,
                        artist: artist,
                        country: country
                    },
                    success: function(response) {
                        $('#concert').html('');

                        $.each(response, function(i, item) {
                            $('#concert').append(`<div class="col-xl-4 col-md-6 mb-4" id="concert">
                                <div class="card">
                                    <img src="${item.image}" class="card-img-top card-content" alt="artwork">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <a href="detail.php?" id="${item.concert_id}" class ="text-decoration-none fw-bold fs-6 fw-bolder"> ${item.concert_name} </a>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <span>Date: ${item.date}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <span>Location: ${item.venue}, ${item.country}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>