@extends('admin.layouts.main')
@section ('CategoriesAdd')
    <main>
        {{-- @dd($data->toArray()) --}}
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Categories Form</title>
          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
          <!-- SweetAlert2 CSS -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      </head>
      <body>
          <div class="container mt-5">
              <h2 class="mb-4">Category Form</h2>
              <form id="categoryForm" method="POST" enctype="multipart/form-data" action="{{ isset($data) ? route('category.update',$data->id) : route('category.store')}}">
                  <!-- Category Name -->
                  @csrf
                  @if(isset($data))
                    @method('PUT')
                  @endif
                  <div class="mb-3">
                      <label for="category_name" class="form-label">Category Name</label>
                      <input type="text" value="{{old('category_name')}}" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
                      <div class="invalid-feedback">Please enter a category name.</div>
                      @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
      
                  <!-- Main Image -->
                  <div class="mb-3">
                      <label for="main_image" class="form-label">Main Image</label>
                      <input type="file" value="{{old('main_image')}}" class="form-control" id="main_image" name="main_image" accept="image/*" required>
                      <div class="invalid-feedback">Please upload a main image.</div>
                      @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
      
                  <!-- Background Image -->
                  <div class="mb-3">
                      <label for="bg_image" class="form-label">Background Image</label>
                      <input type="file" class="form-control" value='{{old('bg_image')}}' id="bg_image" name="bg_image" accept="image/*" required>
                      <div class="invalid-feedback">Please upload a background image.</div>
                      @error('bg_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
      
                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      
          <!-- Bootstrap JS -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
          <!-- SweetAlert2 JS -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
          <script>
              // Form validation and Swal integration
              document.getElementById('categoryForm').addEventListener('submit', function (event) {
                  event.preventDefault();
      
                  // Check if the form is valid
                  if (!this.checkValidity()) {
                      event.stopPropagation();
                      this.classList.add('was-validated');
                      return;
                  }
      
                  // Show SweetAlert confirmation dialog
                  Swal.fire({
                      title: 'Success!',
                      text: 'Your category has been submitted successfully!',
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      // Reset the form after confirmation
                      this.reset();
                      this.classList.remove('was-validated');
                  });
              });
          </script>
      </body>
      </html>
      
      

        
    </main>
@endsection