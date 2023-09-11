<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="text-center">
                <h1>Laravel 10 To-Do List Using MySQL</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Task</h6>
                    <form class="forms-sample" method="post" action="{{ route('update.list') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $showData->id }} ">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Task Title</label>
							<input type="text" class="form-control @error('task_title') is-invalid @enderror" value="{{ $showData->task_title}}" name="task_title" id="exampleInputUsername1" autocomplete="off" placeholder="Task Title">
                            @error('task_title')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Task Description</label>
							<textarea class="form-control @error('task_description') is-invalid @enderror" name="task_description">{{ $showData->task_description }}</textarea>
                            @error('task_description')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
              </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>