<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/loginFunction.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeader.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="loginform admin">
                <h1>管理者ログイン</h1>
                <form action="loginPage.php" method="POST">
                    <ul>
                        <li>
                            <label class="inputlabel">
                                <input class="inputform" type="text" id="admin_id" name="admin_id" placeholder="管理者ID入力">
                            </label>
                        </li>
                        <li>
                            <input class="button mid submit" type="submit" value="ログイン">
                        </li>
                    </ul>
                </form>
            </section>
        </div>
    </div>

</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/topPageLower.php'); ?>