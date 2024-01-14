@extends('layouts.main')

@section('title', "Mata Pelajaran | KelasMaju")

@section("css")
<link rel="stylesheet" href="{{asset("assets/library/prismjs/themes/prism.css")}}">
@endsection

@section('content-header')
<h1>Pengguna</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route("dashboard")}}">Dashboard</a></div>
    <div class="breadcrumb-item">Pengguna</div>
</div>
@endsection

@section('content-body')
    <div class="col-md-6 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Seluruh Data Pengguna</h4>
        </div>
        <div class="card-body p-0">
            <p class="px-4">Berikut adalah daftar seluruh pengguna.</p>
            {{-- id add akan di tangkap jqeury untuk membuat modal
                cek di bootstrap-modal.js --}}
            <div class="m-3 d-flex align-items-center justify-content-end">
                <button class="btn btn-success" data-toggle="modal" data-target="#add">Add Mapel</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                    <th>#</th>
                    <th>MATA PELAJARAN</th>
                    <th>NAMA GURU PENGAJAR</th>
                    <th>ID GURU</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                    <th>ACTION</th>
                </tr>

                @php
                $no = 1;
                @endphp

                @foreach ($mapel as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->teacher->name}}</td>
                        <td>{{$data->teacher_id}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
                        <td>
                            <a href="{{ route('mapel.destroy', $data->id)}}" class="btn btn-danger"
                                data-confirm-delete="true">Delete
                            </a>
                            <button class="btn btn-info" data-id="{{$data->id}}" data-name="{{$data->name}}"
                                data-created_at="{{$data->created_at}}" data-updated_at="{{$data->updated_at}}" data-teacher_id="{{$data->teacher_id}}"
                                data-toggle="modal" data-target="#detailModel">Detail
                            </button>
                        </td>
                    </tr>
                    @endforeach
            </table>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{$mapel->links()}}
        </div>
        </div>
    </div>
@endsection

@section("modal")
    {{-- modal create mapel --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route("mapel.store")}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">NAMA MATA PELAJARAN</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name">
                                        @error('name') <p style="color:red;"><i class="bi bi-exclamation-circle"></i>
                                            Anda harus mengisi nama mata pelajaran.</p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="teacher_id">PILIH GURU</label>
                                        <select class="form-control" name="teacher_id" id="teacher_id">
                                            @foreach($teachersIds as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal detail mapel--}}
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Mata Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {{-- form untuk update --}}
            {{-- param ke 2 dari route itu cuma data fake agar method update di controller tidak eror,
                karena kita kirim id nya dari input hidden id dan value id ini di ambil lewat javascript--}}
            <form action="{{route("mapel.update", "fake")}}" method="POST">
            @csrf
            @method("PUT")
                <div class="modal-body">
                    <input type="hidden" name="mapel_id" id="id">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name">Mata Pelajaran</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="teacher_id">PILIH GURU</label>
                                    <select class="form-control" name="teacher_id" id="teacher_id">
                                        @foreach($teachersIds as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@section("libjs")
<script src="{{asset("assets/library/prismjs/prism.js")}}"></script>
@endsection

{{-- jQuery untuk ambil data guru dari database dan mengirim ke class modal-body --}}
@section("js")
<script src="{{asset("assets/js/page/bootstrap-modal.js")}}"></script>
@endsection
