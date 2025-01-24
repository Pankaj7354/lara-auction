@extends('admin.layouts.main')
@section ('CategoriesAdd')
    <main>
        
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTables Example</title>
  <!-- Include DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Include DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <div class="container">
    <h2>Database Data Table</h2>
    <a href="{{route('category.create')}}">
      <button>Add</button></a>
    <table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Image</th>
          <th>Background Image</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody>
            @foreach($data as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td><img src="{{asset('images\\' . $category->main_image)}}" alt="image" style="width: 100px; height: 100px;"></td>
                <td><img src="{{asset('images\\' . $category->bgimage)}}" alt="image" style="width: 100px; height: 100px;"></td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary mx-2">Edit</a>
                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        ajax: {
          url: 'your-api-endpoint.php', // Replace with your API or backend endpoint
          type: 'GET', // HTTP method for fetching data
          dataSrc: '' // Adjust based on your API response (e.g., 'data' if response contains a 'data' field)
        },
        columns: [
          { data: 'id' },       // Column for ID
          { data: 'name' },     // Column for Name
          { data: 'email' },    // Column for Email
          { data: 'created_at'} // Column for Created At
        ]
      });
    });
  </script>
</body>
</html>

    </main>
@endsection