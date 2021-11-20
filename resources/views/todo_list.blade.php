<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>ToDo List</title>
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		
        <!-- Styles -->
        <style>
            html, body {font-family: 'Nunito', sans-serif;font-weight: 200;height: 100vh;margin: 0;}a{color:black;text-decoration:none;}a:hover{color:black;text-decoration:none;}             .full-height {height: 100vh;}.flex-center {align-items: center;display: flex;justify-content: center;}.position-ref {position: relative;}.top-right {position: absolute;right: 10px;top: 18px;}.content {text-align: center;}.title {font-size: 84px;}.m-b-md {margin-bottom: 30px;}
		</style>
	</head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
				<a href="/todo/">ToDo</a> - {{ $title }}
				</div>
				
                <table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Title</th>
							<th scope="col">Description</th>
							<th scope="col">Created_at</th>
							<th scope="col">Updated_at</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
					
						@foreach ($tasks as $task)
						
							<tr>
								<th scope="row">{{ $task['id'] }}</th>
								<td>{{ $task['title'] }}</td>
								<td>{{ $task['description'] }}</td>
								<td>{{ $task['created_at'] }}</td>
								<td>{{ $task['updated_at'] }}</td>								
								<td><a href="/todo/{{ $task['id'] }}">view</a></td>							
								<td><a href="/todo/remove/{{ $task['id'] }}">remove</a></td>								
							</tr>
							
						@endforeach
						
					</tbody>
				</table>
				
				@php
					if ($_SERVER['REQUEST_URI']=='/todo'){
						echo '<a href="/todo/create">Create task</a>';
					} else {
						echo '<a href="/todo">Back to task list</a>';
					}				
				@endphp
			</div>
		</div>
	</body>
</html>
