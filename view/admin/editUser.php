<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/sessionAdmin.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/editUser.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php'); ?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="recordForm">
                <h1>利用者情報変更</h1>
                <form action="/attendance_record/process/admin/updateUser.php" method="POST">
                    <ul>
                        <li>
                            <label>ユーザーID
                                <input type="text" id="user_id" name="user_id" value="<?=$acquire_dbdata['user_id'] ?>">
                            </label>
                        </li>
                        <li>
                            <label>ユーザー苗字
                                <input type="text" id="user_last_name" name="user_last_name" value="<?=$acquire_dbdata['user_last_name']?>">
                            </label>
                        </li>
                        <li>
                            <label>ユーザー名前
                                <input type="text" id="user_first_name" name="user_first_name" value="<?=$acquire_dbdata['user_first_name']?>">
                            </label>
                        </li>
                        <li class="inline">
                            <div>
                                <input class="button submit inmid" type="submit" value="決定">
                                <input type="hidden" name="id" value="<?=$acquire_dbdata['id'] ?>">
                            </div>
                            <input class="button inmid" type="reset" value="リセット">
                        </li>
                    </ul>
                </form>
            </section>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Lower.php'); ?>