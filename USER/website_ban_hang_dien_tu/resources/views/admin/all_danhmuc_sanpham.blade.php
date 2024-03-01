@extends('admin_layout')
@section('admin_content')
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Liệt Kê Danh Mục Sản Phẩm</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Ngày thêm</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">LSP1</th>
                    <td>Laptop</td>
                    <td>2016-05-25</td>
                  </tr> 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
@endsection