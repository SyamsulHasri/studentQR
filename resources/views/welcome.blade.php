<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StudentQR</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased">

        <div class="px-4 py-5 my3 text-center">
            <img class="d-block mx-auto mb-4" src="{{asset('studentqr.webp')}}" alt="" >
            <h1 class="display-5 fw-bold">Interview Code Challenge for Developer</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Syamsul Hasri</p>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <div>
                        <div class="float-start">
                            <h4> Upload from file </h4>
                            <div class="my-3 ps-4">
                                <a class="text-muted" href="{{route('downloadtemplate')}}">Download Excel Template</a>
                            </div>
                        </div>
                        <form id="create-student" action="{{ route('uploadstudent') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input class="form-control form-control-lg" id="student" name="student" type="file" required>
                        </form>
                    </div>
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                    <div>
                        <button type="submit" form="create-student" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            </svg>
                            Upload 
                        </button>
                        <button type="button" class="btn btn-outline-danger" onclick= "clearInput()">Cancel</button>
                    </div>
                </div>


            </div>
        </div>

        <div class="container">
        @if ($message = Session::get('massage'))
        <div class="float-end">
            <div class="col-md-9 alert alert-success alert-dismissible fade show" role="alert">
                <span> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-check" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                        <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                    </svg>
                </span>
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Level</th>
                    <th scope="col">Parent Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$student->name}}</td>
                        <td>{{$student->class}}</td>
                        <td>{{$student->level}}</td>
                        <td>{{$student->parent_contact}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        <!-- remove input value -->
        <script>
            function clearInput(){
                var getValue= document.getElementById("student");
                    if (getValue.value !="") {
                        getValue.value = "";
                    }
            }
        </script>
    </body>
</html>
