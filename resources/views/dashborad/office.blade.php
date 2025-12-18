@extends('layout.mainlayout')
@section('title','ตารางติดตามงานซ่อม')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-dark mb-0">
            <i class="bi bi-list-task text-primary me-2"></i> ตารางติดตามงาน (ธุรการ)
        </h5>
        {{-- ปุ่ม Export หรือ Refresh --}}
        <button class="btn btn-outline-secondary btn-sm" onclick="location.reload()">
            <i class="bi bi-arrow-clockwise"></i> รีเฟรช
        </button>
    </div>

    {{-- ส่วนสรุป (Summary Cards) --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-3">
                    <small class="text-muted d-block">งานทั้งหมด</small>
                    <span class="h5 fw-bold">{{ $jobs->total() }}</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #ffc107;">
                <div class="card-body p-3">
                    <small class="text-muted d-block">รอดำเนินการ</small>
                    <span class="h5 fw-bold text-warning">...</span> {{-- ใส่ Logic นับจำนวน --}}
                </div>
            </div>
        </div>
        {{-- เพิ่ม Card อื่นๆ ตามต้องการ --}}
    </div>

    {{-- ส่วนค้นหาแบบละเอียด --}}
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
        <div class="card-body p-3">
            <form action="{{ route('officer.tracking') }}" method="GET" class="row g-2">
                <div class="col-12 col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="ค้นหา JobId, สาขา, อุปกรณ์..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <select name="status" class="form-select">
                        <option value="">ทุกสถานะ</option>
                        <option value="received">ได้รับของแล้ว</option>
                        <option value="finished">ซ่อมเสร็จแล้ว</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        ค้นหา
                    </button>
                </div>
                @if(request()->anyFilled(['search', 'status']))
                <div class="col-12 col-md-2">
                    <a href="{{ route('officer.tracking') }}" class="btn btn-light w-100 text-muted">ล้างค่า</a>
                </div>
                @endif
            </form>
        </div>
    </div>

    {{-- Desktop View --}}
    <div class="card shadow-sm d-none d-md-block border-0" style="border-radius: 12px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-3">JobId</th>
                        <th>สาขา</th>
                        <th>อุปกรณ์</th>
                        <th>สถานะปัจจุบัน</th>
                        <th>อัปเดตล่าสุด</th>
                        <th>วันที่ปิดงาน</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                    <tr>
                        <td class="ps-3 fw-bold text-primary">#{{ $job->NotirepairId }}</td>
                        <td><span class="badge rounded-pill bg-secondary bg-opacity-10 text-secondary border border-secondary">{{ $job->branchCode }}</span></td>
                        <td>
                            <div class="fw-medium">{{ $job->equipmentName }}</div>
                        </td>
                        <td>
                            @php
                                $statusStyle = match($job->current_status) {
                                    'ได้รับของเเล้ว' => ['bg' => 'primary', 'icon' => 'bi-box-seam'],
                                    'ซ่อมงานเสร็จเเล้ว | ช่างStore' => ['bg' => 'success', 'icon' => 'bi-check-all'],
                                    'ปิดงานเรียบร้อย' => ['bg' => 'dark', 'icon' => 'bi-door-closed'],
                                    default => ['bg' => 'warning', 'icon' => 'bi-clock']
                                };
                            @endphp
                            <span class="badge bg-{{ $statusStyle['bg'] }} d-inline-flex align-items-center">
                                <i class="bi {{ $statusStyle['icon'] }} me-1"></i> {{ $job->current_status }}
                            </span>
                        </td>
                        <td class="small text-muted">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $job->last_status_date ? date('d/m/Y H:i', strtotime($job->last_status_date)) : '-' }}
                        </td>
                        <td>
                            @if($job->DateCloseJobs)
                                <span class="text-success fw-bold"><i class="bi bi-check-circle-fill"></i> {{ date('d/m/Y', strtotime($job->DateCloseJobs)) }}</span>
                            @else
                                <span class="text-muted small italic">ยังไม่ปิดงาน</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border" title="ดูรายละเอียด">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">ไม่พบข้อมูลรายการแจ้งซ่อม</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Mobile View --}}
    <div class="d-md-none">
        @forelse ($jobs as $job)
        <div class="card mb-3 border-0 shadow-sm" style="border-radius: 15px; border-left: 5px solid {{ $job->DateCloseJobs ? '#198754' : '#ffc107' }} !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <span class="fw-bold text-primary">#{{ $job->NotirepairId }}</span>
                        <div class="h6 fw-bold mt-1 mb-0">{{ $job->equipmentName }}</div>
                    </div>
                    <span class="badge bg-light text-dark border">{{ $job->branchCode }}</span>
                </div>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="small bg-light px-2 py-1 rounded text-dark">
                        <strong>สถานะ:</strong> {{ $job->current_status }}
                    </div>
                </div>

                <div class="row g-0 pt-2 border-top">
                    <div class="col-6">
                        <small class="text-muted d-block">วันที่อัปเดต</small>
                        <small class="fw-bold">{{ $job->last_status_date ? date('d/m/y H:i', strtotime($job->last_status_date)) : '-' }}</small>
                    </div>
                    <div class="col-6 text-end">
                        <small class="text-muted d-block">วันที่ปิดงาน</small>
                        <small class="{{ $job->DateCloseJobs ? 'text-success fw-bold' : 'text-muted' }}">
                            {{ $job->DateCloseJobs ? date('d/m/y', strtotime($job->DateCloseJobs)) : 'รอดำเนินการ' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="text-center py-5 bg-white rounded shadow-sm">ไม่พบข้อมูล</div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $jobs->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection