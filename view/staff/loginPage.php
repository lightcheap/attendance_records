<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/loginFunction.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/staff/TopHeader.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="loginform staff">
            <h1>職員ログイン</h1>
            <form action="loginPage.php" method="POST">
                <ul>
                    <li>
                        <label class="inputlabel">
                            <input class="inputform" type="text" id="staff_id" name="staff_id" placeholder="スタッフID入力">
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