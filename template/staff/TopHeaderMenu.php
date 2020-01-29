<header>
    <div class="top_menu staffcolor">
        <div class="header_logo">
            <a href="#">えふしき</a>
        </div>
        <div class="global_menu">
            <ul>
                <li class="sessionuser"><?=$_SESSION['staff_name']?></li>
                <li class="sp-none"><a href="/attendance_record/view/staff/browsingUserAttendanceData.php">出退勤閲覧</a></li>
                <li class="sp-none"><a href="">支援記録記入</a></li>
                <li class="sp-none"><a href="">作業報告閲覧</a></li>
                <li class="sp-none"><a href="">出退勤登録</a></li>
                <li class="sp-none"><a href="/attendance_record/process/staff/logout.php">ログアウト</a></li>
            </ul>
        </div>
    </div>
</header>