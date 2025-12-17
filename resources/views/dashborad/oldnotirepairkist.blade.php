@extends('layout.mainlayout') {{-- 💡 เปลี่ยนมาใช้ Layout ใหม่ที่กำหนด staffname และ Logout --}}

@section('title', 'รายการแจ้งซ่อม')

@section('content')

    <h5 class="fw-bold text-dark mb-3">
        <i class="bi bi-list-task"></i> รายการแจ้งซ่อมทั้งหมด
        {{-- ✅ เพิ่มการแสดงชื่อผู้ใช้งานในส่วน Content ตามคำขอ --}}
        @if (Auth::check())
            <span class="text-primary small fw-normal">({{ Auth::user()->staffname ?? 'ผู้ดูแลระบบ' }})</span>
        @endif
    </h5>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Desktop View --}}
    <div class="card shadow-sm d-none d-md-block">
        <div class="card-body table-responsive">
            <table id="notiTable" class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 10%">รหัสแจ้งซ่อม</th>
                        <th style="width: 15%">อุปกรณ์</th>
                        <th style="width: 30%">รายละเอียด</th>
                        <th>สาขา</th>
                        <th style="width: 10%">วันที่แจ้ง</th>
                        <th style="width: 10%">วันที่อัพเดทล่าสุด</th>
                        <th style="width: 10%">สถานะ</th>
                        <th style="width: 10%">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{-- Desktop View --}}
                    @foreach ($noti as $item)
                        @php
                            $status = $item->status ?? 'ได้รับของเเล้ว'; // Admin View จะกรองสถานะ 'ยังไม่ได้รับของ' ออกไป
                            $isCompleted =
                                $status == 'ซ่อมงานเสร็จเเล้ว | ช่างStore' || $status == 'ซ่อมงานเสร็จเเล้ว | Supplier';
                            $displayStatus = $isCompleted ? 'ซ่อมเสร็จสิ้น' : $status;

                            $color = match ($status) {
                                'ได้รับของเเล้ว' => 'primary',
                                'กำลังดำเนินการซ่อม | ช่างStore' => 'warning',
                                'ส่งSuplierเเล้ว' => 'info',
                                'ซ่อมงานเสร็จเเล้ว | ช่างStore', 'ซ่อมงานเสร็จเเล้ว | Supplier' => 'success',
                                default => 'secondary',
                            };
                        @endphp
                        <tr>
                            <td>{{ $item->NotirepairId }}</td>
                            <td>{{ $item->equipmentName }}</td>
                            <td class="text-start">{{ $item->DeatailNotirepair }}</td>
                            <td>
                                {{-- <div class="fw-bold">{{ $item->branchCode }}</div> --}}
                                <div class="fw-text-start">{{ $item->branchCode }}</div>
                                <div class="small text-muted">พระราม 9</div>
                            </td>
                            <td>
                                @if ($item->DateNotirepair)
                                    {{ date('d-m-Y H:i', strtotime($item->DateNotirepair)) }}
                                @else
                                    -
                                @endif
                            </td>
                            {{-- แสดงวันที่สถานะล่าสุด --}}
                            <td>
                                @if ($item->statusDate)
                                    {{ date('d-m-Y H:i', strtotime($item->statusDate)) }}
                                @else
                                    -
                                @endif
                            </td>

                            <td><span class="badge bg-{{ $color }}">{{ $displayStatus }}</span></td>
                            <td>
                                @if ($isCompleted)
                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="bi bi-check-circle"></i> เสร็จสิ้น
                                    </button>
                                @else
                                    {{-- สถานะอื่นๆ ที่ไม่เสร็จสิ้นทั้งหมด --}}
                                    <a href="{{ route('noti.show_update_form', $item->NotirepairId) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> อัปเดต
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- ลิงก์แบ่งหน้า (Pagination) สำหรับ Desktop View --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $noti->links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- Mobile View (Card View พร้อม Pagination) --}}
    <div class="d-md-none">
        @foreach ($noti as $item)
            @php
                $status = $item->status ?? 'ได้รับของเเล้ว'; // Admin View จะกรองสถานะ 'ยังไม่ได้รับของ' ออกไป
                $isCompleted = $status == 'ซ่อมงานเสร็จเเล้ว | ช่างStore' || $status == 'ซ่อมงานเสร็จเเล้ว | Supplier';
                $displayStatus = $isCompleted ? 'ซ่อมเสร็จสิ้น' : $status;

                $color = match ($status) {
                    'ได้รับของเเล้ว' => 'primary',
                    'กำลังดำเนินการซ่อม | ช่างStore' => 'warning',
                    'ส่งSuplierเเล้ว' => 'info',
                    'ซ่อมงานเสร็จเเล้ว | ช่างStore', 'ซ่อมงานเสร็จเเล้ว | Supplier' => 'success',
                    default => 'secondary',
                };
            @endphp

            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary">📦 รหัส: {{ $item->NotirepairId }}</h5>
                    <p class="mb-1"><strong>อุปกรณ์:</strong> {{ $item->equipmentName }}</p>
                    <p class="mb-1"><strong>รายละเอียด:</strong> {{ $item->DeatailNotirepair }}</p>
                    <p class="mb-1 text-muted small"><i class="bi bi-geo-alt"></i> <strong>สาขา:</strong> {{ $item->branchCode }}</p>
                    <p class="mb-1 text-muted small">
                        <i class="bi bi-clock"></i>วันที่แจ้งซ่อม:
                        <span class="fw-normal">{{ date('d-m-Y H:i', strtotime($item->DateNotirepair)) }}</span>
                    </p>
                    {{-- แสดงวันที่สถานะล่าสุด (statusDate) --}}
                    @if ($item->statusDate)
                        <p class="mb-1 text-muted small">
                            <i class="bi bi-clock"></i> สถานะล่าสุด:
                            <span class="fw-normal">{{ date('d-m-Y H:i', strtotime($item->statusDate)) }}</span>
                        </p>
                    @endif

                    <p class="mb-2"><span class="badge bg-{{ $color }} fs-6">{{ $displayStatus }}</span></p>

                    @if ($isCompleted)
                        {{-- สถานะการซ่อมเสร็จสิ้น --}}
                        <button class="btn btn-secondary btn-sm w-100" disabled>
                            <i class="bi bi-check-circle"></i> เสร็จสิ้น
                        </button>
                    @else
                        <a href="{{ route('noti.show_update_form', $item->NotirepairId) }}"
                            class="btn btn-warning btn-sm w-100">
                            <i class="bi bi-pencil-square"></i> อัปเดต
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

        {{-- ลิงก์แบ่งหน้า (Pagination) สำหรับ Mobile View  --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $noti->links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- 💡 JavaScript สำหรับเริ่มต้น Datatable และเชื่อมต่อช่องค้นหา Navbar (โค้ดเดิมที่แก้ไขการจัดกึ่งกลาง) --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                // ตรวจสอบขนาดหน้าจอ (เฉพาะ Desktop)
                if (window.matchMedia('(min-width: 768px)').matches) {

                    const notiTable = $('#notiTable').DataTable({
                        "searching": false,
                        "paging": false,
                        "lengthChange": false,
                        "ordering": true,
                        "info": false,
                        "autoWidth": false,
                        "columnDefs": [{
                                "width": "10%",
                                "targets": 0,
                                "className": "dt-center"
                            },
                            {
                                "width": "15%",
                                "targets": 1,
                                "className": "dt-center"
                            },
                            {
                                "width": "30%",
                                "targets": 2,
                                "className": "text-start"
                            },
                            {
                                "width": "10%",
                                "targets": 3,
                                "className": "dt-center"
                            },
                            {
                                "width": "10%",
                                "targets": 4,
                                "className": "dt-center"
                            },
                            {
                                "width": "10%",
                                "targets": 5,
                                "className": "dt-center"
                            },
                            {
                                "width": "15%",
                                "targets": 6,
                                "className": "dt-center"
                            }
                        ],
                        // ✅ แก้ไขตรงนี้: ฝังภาษาไทยลงไปเลย ไม่ต้องโหลด URL
                        "language": {
                            "emptyTable": "ไม่พบข้อมูลในตาราง",
                            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                            "infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                            "infoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
                            "lengthMenu": "แสดง _MENU_ รายการ",
                            "search": "ค้นหา:",
                            "zeroRecords": "ไม่พบข้อมูลที่ตรงกัน",
                            "paginate": {
                                "first": "หน้าแรก",
                                "last": "หน้าสุดท้าย",
                                "next": "ถัดไป",
                                "previous": "ก่อนหน้า"
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
