<header>
    <div class="top_menu">
        <div class="header_logo">
            <a href="#">えふしき</a>
        </div>
        <div class="global_menu">
            <ul>
                <li class="sessionuser"><?= $_SESSION['user_name'] ?></li>
                <li class="sp-none"><a href="/attendance_record/view/user/attendanceCalender.php">登録カレンダー</a></li>
                <li class="sp-none"><a href="/attendance_record/view/user/dataDisplay.php">出退勤検索</a></li>
                <li class="sp-none"><a href="/attendance_record/view/user/userWorkReport.php">作業報告</a></li>
                <li class="sp-none"><a href="/attendance_record/view/user/workReportDisplay.php">作業報告一覧</a></li>
                <li class="sp-none"><a href="/attendance_record/process/user/sessionUnset.php">ログアウト</a></li>
            </ul>
        </div>
    </div>
</header>