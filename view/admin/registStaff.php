<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/registStaff.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php'); ?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="loginform admin">
                <h1>スタッフ登録</h1>
                <form action="registStaff.php" method="POST">
                <ul>
                    <li>
                        <label>スタッフーID<span>※必須</span>
                            <input type="text" id="staff_id" name="staff_id" require>
                        </label>
                    </li>
                    <li>
                        <label>姓<span>※必須</span>
                            <input type="text" id="staff_last_name" name="staff_last_name" require>
                        </label>
                    </li>
                    <li>
                        <label>名<span>※必須</span>
                            <input type="text" id="staff_first_name" name="staff_first_name" require>
                        </label>
                    </li>
                    <li>
                        <input type="submit" value="送信">
                        <input type="reset" value="リセット">
                    </li>
                </ul>
                </form>
                <a href="admin_login_page.php">戻る</a>
            </div>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Lower.php'); ?>