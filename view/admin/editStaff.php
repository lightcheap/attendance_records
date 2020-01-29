<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/sessionAdmin.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/editStaff.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="recordForm">
                <h1>スタッフ情報変更</h1>
                <form action="/attendance_record/process/admin/updateStaff.php" method="POST">
                    <ul>
                        <li>
                            <label>スタッフID
                                <input type="text" id="staff_id" name="staff_id" value="<?=$acquire_dbdata['staff_id'] ?>">
                            </label>
                        </li>
                        <li>
                            <label>スタッフ苗字
                                <input type="text" id="staff_last_name" name="staff_last_name" value="<?=$acquire_dbdata['staff_last_name'] ?>">
                            </label>
                        </li>
                        <li>
                            <label>スタッフ名前
                                <input type="text" id="staff_first_name" name="staff_first_name" value="<?=$acquire_dbdata['staff_first_name'] ?>">
                            </label>
                        </li>
                        <li class="inline">
                            <div>
                                <input class="button submit inmid" type="submit" value="決定">
                                <input type="hidden" name="id" value="<?=$acquire_dbdata['id']?>">
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