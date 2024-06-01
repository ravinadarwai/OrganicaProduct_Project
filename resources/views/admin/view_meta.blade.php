<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>
<body>
@include('admin.nav')
   





<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color: green">fruit List</h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>keyword</th>
                        <th>Description</th>
                        <th>url</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meta as $fruit)
                        <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $fruit->title }}</td>  
    <td>{{ $fruit->keyword }}</td>
    <td>{{ $fruit->description }}</td>
    <td>{{ $fruit->url }}</td>
    <td style="display: flex; margin-top: 2rem;">
        <form action="{{ route('meta.destroy', $fruit->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this metadata?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">
                <i class="fa-solid fa-trash-can text-white"></i>
            </button>
        </form>
        <button type="button" class="btn btn-success mx-2">
            <a href="{{ route('meta.edit', ['id' => $fruit->id]) }}">
                <i class="fa-solid fa-pen-to-square text-light"></i>
            </a>
        </button>
    </td>
</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('admin.footer')  
  </body>
</html>

