// ... (omitted: กำหนด $status, $color)

@php
    $isRepairFinished = ($status === 'ซ่อมงานเสร็จสิ้น | ช่างStore');
    $isClosed = ($item->closedJobs === 'ปิดงาน'); // ใช้ closedJobs จาก notirepair table
@endphp
<tr>
    {{-- ... (omitted: คอลัมน์ข้อมูล) ... --}}
    <td>
        {{-- คอลัมน์ จัดการ --}}
        @if (!$isClosed && $status === 'ยังไม่ได้รับของ')
            {{-- สถานะ 1: ปุ่ม "รับของ" --}}
            <form action="{{route('noti.accept', $item->NotirepairId)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('ยืนยันการรับของรายการ: {{ $item->NotirepairId }} ?')">
                    <i class="bi bi-box-seam"></i> รับของ
                </button>
            </form>
        
        @elseif (!$isClosed && $isRepairFinished)
            {{-- สถานะ 2: ปุ่ม "ปิดงาน" (เมื่อช่างซ่อมเสร็จ และยังไม่ถูกปิดงาน) --}}
            <form action="{{route('noti.close', $item->NotirepairId)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('ยืนยันการปิดงานรายการ: {{ $item->NotirepairId }} และส่งมอบสินค้าแล้วหรือไม่?')">
                    <i class="bi bi-check-circle-fill"></i> ปิดงาน
                </button>
            </form>

        @elseif ($isClosed)
            {{-- สถานะ 3: แสดงว่าปิดงานแล้ว --}}
            <span class="text-success fw-bold">{{ $item->closedJobs }}</span><br>
            <span class="text-muted small">@if($item->DateCloseJobs) {{ date('d-m-Y H:i', strtotime($item->DateCloseJobs)) }} @endif</span>
        
        @else
            {{-- สถานะ 4: อื่นๆ (รอดำเนินการซ่อม) --}}
            <span class="text-secondary">รอดำเนินการ</span>
        @endif
    </td>
</tr>
