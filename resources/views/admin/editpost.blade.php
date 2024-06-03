<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3ff381f750.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-left: 25px; margin-right: 25px; float: right;">
            <a href="{{ route('all.users') }}"><button type="button" class="btn btn-primary"><i class="fas fa-undo"
                    style="margin-right: 8px;"></i>Go Back</button></a>
        </div>

        <div>
            <div class="container shadow-lg" style="width: 600px; border-radius: 10px; margin-bottom: 50px;">
                <form action="{{ route('post.update', $posts->id) }}" method="POST">
                    @csrf
                    <div class="form-row" style="padding: 5px;">
                        <div class="form-group col-md-12">
                            <label for="post" style="margin-bottom: 10px;">Original Post</label>
                            <input class="form-control" type="text" name="post" id="post" value="{{ $posts->post}}">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;"><i class="fas fa-edit" style="margin-right: 5px;"></i>Edit Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>