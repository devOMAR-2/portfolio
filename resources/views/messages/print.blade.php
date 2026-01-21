<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة من {{ $message->name }} - طباعة</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, 'Cairo', 'Tajawal', Arial, sans-serif;
            font-size: 9pt;
            line-height: 1.4;
            color: #1a1a1a;
            background: #fff;
            padding: 10mm;
            direction: rtl;
            text-align: right;
        }

        .header {
            border-bottom: 1px solid #333;
            padding-bottom: 8px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 14pt;
            font-weight: 600;
            color: #111;
        }

        .header .subtitle {
            font-size: 8pt;
            color: #666;
        }

        .section {
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 9pt;
            font-weight: 600;
            color: #333;
            background: #f5f5f5;
            padding: 4px 8px;
            margin-bottom: 6px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 6px 12px;
        }

        .info-grid.two-cols {
            grid-template-columns: 1fr 1fr;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-item.full-width {
            grid-column: span 4;
        }

        .info-item.half-width {
            grid-column: span 2;
        }

        .info-label {
            font-size: 7pt;
            font-weight: 600;
            color: #888;
            margin-bottom: 1px;
        }

        .info-value {
            font-size: 9pt;
            color: #1a1a1a;
            word-break: break-word;
        }

        .info-value.empty {
            color: #aaa;
        }

        .message-content {
            padding: 8px;
            white-space: pre-wrap;
            font-size: 9pt;
            line-height: 1.5;
            max-height: 120px;
            overflow: hidden;
        }

        .status-badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8pt;
            font-weight: 600;
        }

        .footer {
            margin-top: 10px;
            padding-top: 6px;
            border-top: 1px solid #ddd;
            font-size: 7pt;
            color: #999;
            text-align: center;
        }

        .legal-section {
            margin-top: 12px;
            padding: 10px;
            border: 1px solid #333;
            background: #fafafa;
        }

        .legal-section .legal-title {
            font-size: 9pt;
            font-weight: 700;
            color: #111;
            text-align: center;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        .legal-section .legal-text {
            font-size: 7pt;
            line-height: 1.6;
            color: #333;
            text-align: justify;
        }

        .legal-section .legal-ref {
            margin-top: 8px;
            font-size: 7pt;
            display: flex;
            justify-content: space-between;
            border-top: 1px dashed #ccc;
            padding-top: 6px;
        }

        .legal-section .signature-line {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .legal-section .signature-box {
            flex: 1;
            text-align: center;
            font-size: 7pt;
        }

        .legal-section .signature-box .line {
            border-bottom: 1px solid #333;
            height: 25px;
            margin-bottom: 4px;
        }

        .inline-info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .inline-info .info-item {
            flex-direction: row;
            gap: 4px;
            align-items: center;
        }

        @media print {
            body { padding: 0; }
            .no-print { display: none !important; }
        }

        .print-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 10pt;
            cursor: pointer;
            border-radius: 4px;
        }

        .print-button:hover { background: #555; }
    </style>
</head>
<body>
    @php
        $statusLabels = ['unread' => 'غير مقروءة', 'seen' => 'تمت المشاهدة', 'contacted' => 'تم التواصل'];
        $deviceLabels = ['Desktop' => 'حاسوب', 'Mobile' => 'جوال', 'Tablet' => 'لوحي'];
    @endphp

    <button class="print-button no-print" onclick="window.print()">طباعة</button>

    <div class="header">
        <h1>رسالة تواصل</h1>
    </div>

    <div class="section">
        <div class="section-title">معلومات المرسل</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">الاسم</span>
                <span class="info-value">{{ $message->name }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">البريد الإلكتروني</span>
                <span class="info-value">{{ $message->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">الشركة</span>
                <span class="info-value {{ !$message->company ? 'empty' : '' }}">{{ $message->company ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">الهاتف</span>
                <span class="info-value">{{ $message->phone ?: '-' }}</span>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">نص الرسالة</div>
        <div class="message-content">{{ $message->message }}</div>
    </div>

    <div class="section">
        <div class="section-title">الحالة والتتبع</div>
        <div class="inline-info">
            <div class="info-item">
                <span class="info-label">الحالة:</span>
                <span class="status-badge">{{ $statusLabels[$message->status->value] }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">تاريخ الاستلام:</span>
                <span class="info-value">{{ $message->created_at->locale('ar')->translatedFormat('l، j F Y - g:i A') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">تاريخ التحديث:</span>
                <span class="info-value">{{ $message->updated_at->locale('ar')->translatedFormat('l، j F Y - g:i A') }}</span>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">معلومات المستخدم</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">عنوان IP</span>
                <span class="info-value">{{ $message->ip_address ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">المتصفح</span>
                <span class="info-value">{{ $message->browser ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">النظام</span>
                <span class="info-value">{{ $message->platform ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">الجهاز</span>
                <span class="info-value">{{ $deviceLabels[$message->device] ?? $message->device ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">الدولة</span>
                <span class="info-value">{{ $message->country ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">المدينة</span>
                <span class="info-value">{{ $message->city ?: '-' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">المصدر</span>
                <span class="info-value" style="font-size:8pt;">{{ $message->referrer_url ?: 'زيارة مباشرة' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">وكيل المستخدم</span>
                <span class="info-value" style="font-size:7pt;">{{ $message->user_agent ?: '-' }}</span>
            </div>
        </div>
    </div>

    <div class="footer">
        devOMAR <br/>
        طُبع في {{ now()->locale('ar')->translatedFormat('l، j F Y - g:i A') }}
    </div>
</body>
</html>
