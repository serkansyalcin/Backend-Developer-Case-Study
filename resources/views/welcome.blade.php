<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <section class="task-results">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body mt-5">
                            <h1>Total minimum number of weeks required - {{$minimum_weeks}} weeks</h1> 

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        @foreach($weekly_tasks as $name => $task)
                                        <th scope="col">{{$name}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 1; $i <= $minimum_weeks; $i++)
                                    <tr>
                                        <th scope="row">Week {{$i}}</th>
                                        @foreach($weekly_tasks as $name => $task)
                                            <td>
                                                @forelse($task['tasks'][$i] as $_task)
                                                {{$_task['name']}} {{!$loop->last ? ',' : ''}}
                                                @empty
                                                 -
                                                @endforelse
                                            </td>
                                        @endforeach
                                        
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
