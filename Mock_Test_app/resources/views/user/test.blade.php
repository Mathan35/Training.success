<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      
        <div class="row">
            <div class="col-md-6"><br><br>
                <h1>New Data</h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">user_id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($allNewData as $data)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{$data['user_id']}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['email']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6"><br><br>
                <h1>Existing data</h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">user_id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($allExistData as $value)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{$value['user_id']}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['email']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="">
            <div>
                <h1>Existing Email</h1>
                <p>{{$existData}}</p>
            </div>

            <div>
                <h1>New Email</h1>
                <p>{{$newData}}</p>

            </div>

        </div>

    </div>

</body>
</html>