
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>

<div class="container">
  <div class="text-center">
    <h1>Daily Task</h1>
        <div class="row">
            <div class="col-md-12">

            @foreach($errors->all() as $err)
            <div class='alert alert-danger' role='alert'>
                {{$err}}
            </div>
            @endforeach
            <form method="post" action="/saveTask">


            {{csrf_field()}}
                    <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here...">
           
                </br>
                    <input type="submit" class="btn btn-primary" value="SAVE">
                    <input type="button" class="btn btn-warning" value="CLEAR">
            </form>

                
                <table class="table table-dark">
                </br>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Completed</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>

                    @foreach($taskView as $task)
                    
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->task}}</td>
                      
                        <td>
                        @if($task->isCompleted)
                        <button class='btn btn-success'>Completed</button>
                        @else
                        <button class='btn btn-warning'>Not Completed</button>
                        @endif
                        </td>
                     
                        <td>
                         @if(!$task->isCompleted)
                         <a href="/markAsCompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                         @else
                         <a href="/markAsNotCompleted/{{$task->id}}" class="btn btn-info">Mark As Not Completed</a>
                         @endif
                        </td>

                        <td>
                        <a href="/deleteTask/{{$task->id}}" class="btn btn-outline-danger">DELETE</a>
                        </td>

                        <td>
                        <a href="/updateTask/{{$task->id}}" class="btn btn-outline-success">UPDATE</a>
                        </td>

                    </tr>
                   
                    @endforeach

                </table>
    
            </div>
         </div>
    </div> 
</div>
   
</body>
</html>