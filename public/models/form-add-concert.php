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

    <title>Nur Muhammad Himawan</title>
</head>

<body>

    <div class="container py-5">
        <h1 id="header">Add New Concert</h1>
        <form enctype="multipart/form-data">
            <input type="hidden" id="concert_id" name="concert_id" value="0">

            <div class="row mb-3">
                <label for="concert_name" class="col-sm-2 col-form-label">Concert Name *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="concert_name" name="concert_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="artist_id" class="col-sm-2 col-form-label">Artist *</label>
                <div class="col-sm-10">
                    <select class="form-control" id="artist_id" name="artist_id" required>
                        <option value="" selected>-</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input id="date" class="form-control" type="date" name="date" />

                </div>
            </div>
            <div class="row mb-3">
                <label for="venue" class="col-sm-2 col-form-label">Venue *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" name="venue" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="country" class="col-sm-2 col-form-label">Country *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
            </div>


            <div class="row mb-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            $.get('get-artist.php?action=getAll', function(data) {
                $.each(data, function(key, value) {
                    $('#artist_id').append('<option value="' + value.artist_id + '">' + value.artist_name + '</option>');
                });

                var params = window.location.search.substring(1).split('&');
                for (var i = 0; i < params.length; i++) {
                    params[i] = params[i].split('=');
                }

                if (params[0][0] == "action" && params[0][1] == "update") {
                    $("#header").html("Update Concert");
                    $.get("concert.php?action=detail&id=" + params[1][1], function(data) {
                        $('#concert_id').val(data.concert_id);
                        $('#concert_name').val(data.concert_name);
                        $('#description').text(data.description);
                        $('#artist_id').val(data.artist_id);
                        $('#date').val(data.date);
                        $('#venue').val(data.venue);
                        $('#country').val(data.country);
                    });
                }


                $("form").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    if (params[0][0] == "action" && params[0][1] == "update") {

                        $.ajax({
                            url: 'concert.php?action=update',
                            type: 'POST',
                            data: formData,
                            success: function(data) {
                                alert("Data concert berhasil diubah");
                                window.location.href = "dashboard.php";
                            },
                            error: function(data) {
                                alert("Data Concert gagal diubah");
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    } else {
                        $.ajax({
                            url: "concert.php?action=create",
                            type: "POST",
                            data: formData,
                            success: function(data) {
                                alert("Data Concert berhasil ditambahkan");
                                window.location.href = "page-dashboard.php";
                            },
                            error: function(data) {
                                alert("Data Concert gagal ditambahkan");
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>