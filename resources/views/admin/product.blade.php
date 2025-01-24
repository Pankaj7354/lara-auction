@extends('admin.layouts.main')

@section('ProductAdd')
    <main>


  <title>Product Table</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Product's Table</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        Add Product
      </button>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">product Price</th>
          <th scope="col">product_image</th>
          <th scope="col">Category-Id </th>
          <th scope="col">product_bid_start</th>
          <th scope="col">product_bid_end</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="productTableBody">
        <!-- Product rows will be added dynamically here -->
        @foreach ($data as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->product_price }}</td>
          <td><img src="{{ asset('product_images/'.$product->product_image) }}" alt="product_image" style="width: 100px; height: 100px;"></td>
          
          <td>{{ $product->category_name }}</td>
          <td>{{date('d-m-Y H:i A', strtotime($product->product_bid_start)) }}</td>
          <td>{{ date('d-m-Y H:i A', strtotime($product->product_bid_end)) }}</td>
          <td>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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
          action="{{isset($data) ? route('product.update', $data->id ) : route('product.store')}}"
          enctype="multipart/form-data" >
            @csrf
            @if(isset($data))
                    @method('PUT')
                  @endif

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
              <input type="datetime-local" value="{{old('product_bid_start')}}" class="form-control" name="product_bid_start"  />
              @error('product_bid_start')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="bidEnd" class="form-label">Bid End</label>
              <input type="datetime-local" value="{{old('product_bid_end')}}" class="form-control" name="product_bid_end" />
              @error('product_bid_end')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
  </script>
  {{-- <script>
    document.getElementById("addProductForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const productName = document.getElementById("productName").value;
      const productCategory = document.getElementById("productCategory").value;
      const productPrice = document.getElementById("productPrice").value;

      const productTableBody = document.getElementById("productTableBody");

      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td>${productTableBody.children.length + 1}</td>
        <td>${productName}</td>
        <td>${productCategory}</td>
        <td>${productPrice}</td>
        <td>
          <button class="btn btn-sm btn-danger">Delete</button>
        </td>
      `;

      productTableBody.appendChild(newRow);

      // Reset form and close modal
      e.target.reset();
      const modal = bootstrap.Modal.getInstance(document.getElementById("addProductModal"));
      modal.hide();
    });
  </script> --}}

</main>
@endsection