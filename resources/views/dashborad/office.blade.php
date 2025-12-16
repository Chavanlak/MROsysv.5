@extends('layout.adminlayout')
@section('title','รายการการเเจ้งซ่อม')
@section('content')

<h5 class="fw-bold text-dark mb-3">
<i class="bi bi-list-task"></i> ตารางติดตามงาน
</h5>


<div class="card shadow-sm d-none d-md-block">
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>JobId</th>
                    <th>สาขา</th>
                    <th>วันที่อัพเดท</th>
                    <th>สถานะ</th>
                    <th>วันที่ปิดงาน</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ( as )
                
                @endforeach --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection