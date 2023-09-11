<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

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
                    <h6 class="card-title">Add Task</h6>
                    <form class="forms-sample" method="post" action="{{ route('add.list') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Task Title</label>
							<input type="text" class="form-control @error('task_title') is-invalid @enderror" name="task_title" id="exampleInputUsername1" autocomplete="off" placeholder="Task Title">
                            @error('task_title')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Task Description</label>
							<textarea class="form-control @error('task_description') is-invalid @enderror" name="task_description"></textarea>
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
    <div class="row">
        <div class="offset-md-2 col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">List of Task
                    </h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Title</th>
                                <th>Task Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($showList as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->task_title }}</td>
                                <td>{{ $data->task_description }}</td>
                                <td>
                                    <a href="{{ route('edit.list', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('delete.list', $data->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
</body>
</html>