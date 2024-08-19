<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>
    <h1>Chi tiết người dùng {{ $user['name'] }}</h1>
    <table class="table table-striped">

        <thead>
            <tr>
                <th>trường  </th>
                <th>giá trị </th>
                
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $value)
                <tr>
                    <td> {{$key}}</td>
                    <td> {{$value}}</td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
