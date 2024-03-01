@extends('admin_layout')
@section('admin_content')
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm Danh Mục Sản Phẩm</h5>
              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mã loại sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Tên loại sản phẩm</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="add-danhmuc-sanpham" class="btn btn-primary">Thêm</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
@endsection