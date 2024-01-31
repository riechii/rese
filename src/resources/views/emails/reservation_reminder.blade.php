<!DOCTYPE html>
<html>

<body>
    <p>本日の予約の確認</p>

    <p>予約詳細:</p>
    <ul>
        <li>予約名: {{ $reservation->user->name }}様</li>
        <li>予約店舗: {{ $reservation->store->shop }}</li>
        <li>予約時間: {{ $reservation->time }}</li>
        <li>予約人数: {{ $reservation->number }}</li>
    </ul>
    <p>ご来店をお待ちしております。</p>
</body>
</html>