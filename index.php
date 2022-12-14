<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Upload JSON File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <h2>PHP Upload JSON File</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="db" class="form-label">Database:</label>
                                <input type="text" name="db" id="db" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tbl" class="form-label">Table:</label>
                                <input type="text" name="tbl" id="tbl" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="fileToUpload" class="form-label">Select file to upload:</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Upload" name="submit" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>