@extends('admin.layouts.main')

@section('ProductAdd')
    <main>


  <title>Product Table</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Product's Table</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        Add Product
      </button>
    </div>

    <table id="productTable" class="table table-striped">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Image</th>
              <th scope="col">Category-Id</th>
              <th scope="col">Bid Start</th>
              <th scope="col">Bid End</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($data as $product)
          <tr id="row-{{ $product->id }}">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->product_price }}</td>
              <td>
                  <img src="{{ asset('product_images/'.$product->product_image) }}" alt="product_image" style="width: 100px; height: 100px;">
              </td>
              <td>{{ $product->category_name }}</td>
              <td>{{ date('d-m-Y H:i A', strtotime($product->product_bid_start)) }}</td>
              <td>{{ date('d-m-Y H:i A', strtotime($product->product_bid_end)) }}</td>
              <td>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                  <button class="btn btn-sm btn-danger delete-product" data-id="{{ $product->id }}">Delete</button>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  
  <script>
  $(document).ready(function() {
      // Initialize DataTables
      $('#productTable').DataTable();
  
      // Handle delete action with SweetAlert
      $('.delete-product').click(function() {
          var productId = $(this).data('id');
          var row = $('#row-' + productId);
  
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
                      url: "{{ route('product.destroy', '') }}/" + productId,
                      type: "POST",
                      data: {
                          _method: "DELETE",
                          _token: "{{ csrf_token() }}"
                      },
                      success: function(response) {
                          Swal.fire("Deleted!", "The product has been deleted.", "success");
                          row.fadeOut(500, function() {
                              $(this).remove();
                          });
                      },
                      error: function() {
                          Swal.fire("Error!", "Something went wrong.", "error");
                      }
                  });
              }
          });
      });
  });
  </script>
  </div>  

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addProductForm" method="POST" 
          action="{{ route('product.store')}}"
          enctype="multipart/form-data" >
            @csrf
            {{-- @if(isset($data))
                    @method('PUT')
                  @endif --}}

            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" value="{{old('product_name')}}" class="form-control" name="product_name"  />
              @error('product_name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" value="{{old('product_price')}}"  class="form-control" name="product_price"  />
              @error('product_price')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="productCategory" class="form-label">product_image</label>
              <input type="file" value="{{old('product_image')}}" class="form-control" name="product_image"  />
              @error('product_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            {{-- <div class="mb-3">
              <label for="productSubImages" class="form-label">Product Multipal Images</label>
              <input type="file" class="form-control" name="product_sub_image[]" accept="image/*" multiple />
              @error('product_sub_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div> --}}
            <div class="mb-3">
              <label for="productCategory" class="form-label">Category</label>
              <select class="form-select"  name="category_id" >
                <option value="" disabled selected>Select a category</option>
                @foreach ($category as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
              </select>
              @error('category_id')
                <div class="text-danger">{{ $message }}</div> 
              @enderror
            </div>
<div class="mb-3">
  <label for="bidStart" class="form-label">Bid Start</label>
  <input type="datetime-local" id="bidStart" value="{{ old('product_bid_start') }}" class="form-control" name="product_bid_start" required />
  @error('product_bid_start')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label for="bidEnd" class="form-label">Bid End</label>
  <input type="datetime-local" id="bidEnd" value="{{ old('product_bid_end') }}" class="form-control" name="product_bid_end" required />
  @error('product_bid_end')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset()); // Adjust timezone differences
    let minDateTime = now.toISOString().slice(0, 16); // Format YYYY-MM-DDTHH:MM

    let bidStart = document.getElementById("bidStart");
    let bidEnd = document.getElementById("bidEnd");

    bidStart.setAttribute("min", minDateTime);
    bidEnd.setAttribute("min", minDateTime);

    function adjustTimeToBusinessHours(date) {
      let hour = date.getHours();
      if (hour < 9) {
        date.setHours(9, 0, 0, 0); // Set to 9:00 AM
      } else if (hour > 21) {
        date.setDate(date.getDate() + 1); // Move to next day
        date.setHours(9, 0, 0, 0); // Start at 9:00 AM
      }
      return date;
    }

    bidStart.addEventListener("change", function () {
      let selectedDate = new Date(this.value);
      selectedDate = adjustTimeToBusinessHours(selectedDate);

      let minEndDate = new Date(selectedDate);
      minEndDate.setMinutes(selectedDate.getMinutes() + 30); // At least 30 min later

      let formattedMinEnd = minEndDate.toISOString().slice(0, 16);
      bidEnd.setAttribute("min", formattedMinEnd);
      bidEnd.value = formattedMinEnd; // Auto-set Bid End
    });
  });
</script>


            

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
  </script>
 

</main>
@endsection