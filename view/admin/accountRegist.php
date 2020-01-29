<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/accountRegist.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeader.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="loginform admin">
                <h1>管理者登録</h1>
                <form action="accountRegist.php" method="POST">
                    <ul>
                        <li>
                            <label>
                                <input class="inputform" type="text" id="admin_name" name="admin_name" placeholder="管理者名">
                            </label>
                        </li>
                        <li>
                            <label>
                                <input class="inputform" type="text" id="admin_id" name="admin_id" placeholder="管理者ID">
                            </label>
                        </li>
                        <li>
                            <input class="button mid submit" type="submit" value="登録">
                        </li>
                    </ul>
                </form>
            </section>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Lower.php'); ?>