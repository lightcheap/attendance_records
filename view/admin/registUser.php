<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/registUser.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="loginform admin">
            <h1>利用者登録</h1>
                <form action="registUser.php" method="POST">
                    <ul>
                        <li>
                            <label>ユーザーID<span>※必須</span>
                                <input type="text" id="user_id" name="user_id" require>
                            </label>
                        </li>
                        <li>
                            <label>姓<span>※必須</span>
                                <input type="text" id="user_last_name" name="user_last_name" require>
                            </label>
                        </li>
                        <li>
                            <label>名<span>※必須</span>
                                <input type="text" id="user_first_name" name="user_first_name" require>
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
