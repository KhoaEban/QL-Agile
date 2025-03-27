@extends('layouts.master_admin')
@section('title', 'Chi tiết cong nghe')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa Công nghệ</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.congnghe.update', $congnghe->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaCongNghe">{{ __('Ma Công nghệ') }}</label>
                            <input type="text" class="form-control" id="MaCongNghe" name="MaCongNghe"
                                value="{{ $congnghe->MaCongNghe }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenCongNghe">{{ __('Ten Công nghệ') }}</label>
                            <input type="text" class="form-control" id="TenCongNghe" name="TenCongNghe"
                                value="{{ $congnghe->TenCongNghe }}" required>
                        </div>

                        <div class="form-group">
                            <label for="KhoaID">{{ __('Khoa') }}</label>
                            <select class="form-control" id="KhoaID" name="KhoaID" required>
                                <option value="">-- Chọn khoa --</option>
                                @foreach ($khoas as $khoa)
                                    <option value="{{ $khoa->id }}" {{ $khoa->id == $congnghe->KhoaID ? 'selected' : '' }}>
                                        {{ $khoa->TenKhoa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
