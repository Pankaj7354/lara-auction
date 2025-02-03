@extends('admin.layouts.main')

@section('CategoriesAdd')
<main>
    <div class="container">
        <h2>Categories Table</h2>

        <!-- Add Category Button -->
        <a href="{{ route('category.create') }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to create a new category?')">
          Add Category
        </a>

        <!-- Categories Table -->
        <table id="categoriesTable" class="display table table-striped" style="width:100%">
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
                <tr id="row-{{ $category->id }}">
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

    
    <!-- Include jQuery, DataTables, and SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTables
            $('#categoriesTable').DataTable();

            // // Handle Add/Edit Category Modal
            // $('.edit-category').click(function () {
            //     var id = $(this).data('id');
            //     var name = $(this).data('name');

            //     $('#categoryId').val(id);
            //     $('#categoryName').val(name);
            //     $('#categoryModalLabel').text('Edit Category');
            //     $('#categoryModal').modal('show');
            // });

            // // Handle Add/Edit Category AJAX
            // $('#categoryForm').submit(function (e) {
            //     e.preventDefault();
            //     var formData = new FormData(this);
            //     var categoryId = $('#categoryId').val();
            //     var url = categoryId ? "{{ route('category.update', '') }}/" + categoryId : "{{ route('category.store') }}";
            //     var method = categoryId ? "POST" : "POST";

            //     if (categoryId) {
            //         formData.append('_method', 'PUT');
            //     }

            //     $.ajax({
            //         url: url,
            //         type: method,
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {
            //             Swal.fire("Success!", "Category saved successfully.", "success");
            //             $('#categoryModal').modal('hide');
            //             location.reload();
            //         },
            //         error: function () {
            //             Swal.fire("Error!", "Something went wrong.", "error");
            //         }
            //     });
            // });

            // Handle Delete Category with SweetAlert
            $('.delete-category').click(function () {
                var categoryId = $(this).data('id');
                var row = $('#row-' + categoryId);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won’t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('category.destroy', '') }}/" + categoryId,
                            type: "POST",
                            data: {
                                _method: "DELETE",
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                Swal.fire("Deleted!", "The category has been deleted.", "success");
                                row.fadeOut(500, function () {
                                    $(this).remove();
                                });
                            },
                            error: function () {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>

</main>
@endsection
