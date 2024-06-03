<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3ff381f750.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .modal-inputs {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        @if(session('success'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-success alert-dismissible fade-out show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('add.users') }}" method="POST" id="userForm">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Handle</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->isEmpty())
                        <tr>
                            <td colspan="8" style="text-align: center;">NO USERS</td>
                        </tr>
                        @else
                        @foreach($users as $user)
                        <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td><a href="{{ route('remove.user', $user->id) }}"
                                            title="Remove User"
                                            class="fas fa-trash fa-lg remove-user" id="liveToastBtn" style="margin-left: 30px; text-decoration: none"></a>
                        </td>
                        <td><a href="{{ route('edit.user', $user->id) }}" id="mediumButton"
                                            title="Edit User"
                                            class="fas fa-edit fa-lg edit-user" style="text-decoration: none; cursor: pointer;"></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
<hr>

        <div class="row" style="margin-top: 50px;">
            <div class="form-floating">
                <form action="{{ route('add.post') }}" method="POST">
                    @csrf
                    <textarea class="form-control" name="post" placeholder="What's on your mind?" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea" style="margin-left: 10px;"></label>
                    <input type="hidden" >
                    <button type="submit" class="btn btn-success" style="margin-top: 10px;">Post</button>
                </form>
            </div>

            <hr style="margin-top: 10px;">
            <div class="posts">
                @foreach($posts as $post)
                <div class="card" style="width: 18rem; margin-bottom: 10px;">
                    <div class="card-body">
                        <p class="card-text">{{ $post->post }}</p>
                        <a href="{{ route('edit.post', $post->id) }}" class="card-link">Edit</a>
                        <a href="{{ route('remove.post', $post->id) }}" class="card-link">Delete</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<script>
window.setTimeout(function() {
    $(".fade-out").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 5000);
</script>
</body>
</html>