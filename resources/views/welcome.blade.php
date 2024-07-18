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
                                        <th scope="col">DEV1</th>
                                        <th scope="col">DEV2</th>
                                        <th scope="col">DEV3</th>
                                        <th scope="col">DEV4</th>
                                        <th scope="col">DEV5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Week 1</th>
                                        <td>Task 1, Task 2</td>
                                        <td>Task 3, Task 4</td>
                                        <td>Task 5, Task 6</td>
                                        <td>Task 7, Task 8</td>
                                        <td>Task 9, Task 10</td>
                                    </tr>
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
