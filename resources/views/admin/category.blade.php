@extends('admin.layouts.main')
@section ('CategoriesAdd')
    <main>
     
     
     
     
        <div class="container">
          <h2>Database Data Table</h2>
          
          <table id="example" class="display" style="width:100%">
            <a href="{{ route('category.create') }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to create a new category?')">
              Add Category
            </a>
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
              @foreach ($data as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <img src="{{ asset('images/' . $category->main_image) }}" alt="image" style="width: 100px; height: 100px;">
                  </td>
                  <td>
                    <img src="{{ asset('images/' . $category->bgimage) }}" alt="image" style="width: 100px; height: 100px;">
                  </td>
                  <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary mx-2">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
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
      
        <!-- Initialize DataTables -->
        <script>
          $(document).ready(function() {
            $('#example').DataTable();
          });
        </script>
      
      
    </main>
@endsection