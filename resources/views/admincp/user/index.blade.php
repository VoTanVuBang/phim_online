@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.navbar')
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê User</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên User:</th>
                            <th scope="col">Slug thể loại</th>
                            <th scope="col">Mô tả thể loại</th>
                            <th scope="col">Hiển thị/ Ẩn</th>
                            <th scope="col">Quản lí</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
