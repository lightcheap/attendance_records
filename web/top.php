
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
    <main>
        <div class="top-contents">
            <h1>えふしき</h1>
            <h2>"エクセル不使用でも出退勤を記録出来る"<br>を目指したサービスです。</h2>
        </div>
        <div class="container">
            <div class="login_select">
                <a class="button top-login" href="/attendance_record/view/user/loginPage.php">利用者ログイン</a>
                <a class="button top-login" href="/attendance_record/view/staff/loginPage.php">職員ログイン</a>
                <a class="button top-login" href="/attendance_record/view/admin/loginPage.php">管理者ログイン</a>
            </div>
        </div>
    </main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/topPageLower.php');?>
