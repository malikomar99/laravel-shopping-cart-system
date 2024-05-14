<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        
    </head>
    <body >
        <div class="container-sm">

       <table>
<td class="bg-primary">name</td>
<td class="bg-secondary">email</td>
<td class="bg-success">password</td>


@foreach ($data as $data )
    <tr>

<td class="bg-primary">{{$data -> name}}</td>
<td class="bg-secondary">{{$data -> email}}</td>
<td class="bg-success">{{$data -> password}}</td>
    </tr>

@endforeach
       </table>
        </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



    </body>
    </html>