<header>
    <div class="top_menu admincolor">
        <div class="header_logo">
            <a href="#">えふしき</a>
        </div>
        <div class="global_menu">
            <ul>
                <li><a href="/attendance_record/index.php">TOPページへ</a></li>
                <li class="sessionuser"><?= $_SESSION['admin_name'] ?></li>
                <li class="sp-none"><a href="userList.php">利用者一覧</a></li>
                <li class="sp-none"><a href="registUser.php">利用者登録</a></li>
                <li class="sp-none"><a href="staffList.php">スタッフ一覧</a></li>
                <li class="sp-none"><a href="registStaff.php">スタッフ登録</a></li>
                <li class="sp-none"><a href="/attendance_record/process/admin/logout.php">ログアウト</a></li>
            </ul>
        </div>
    </div>
</header>