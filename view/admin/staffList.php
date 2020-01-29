<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/admin/staffList.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Upper.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/TopHeaderMenu.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="loginform admin">
                <h1>スタッフ一覧</h1>
                <table>
                    <tr>
                        <th>スタッフID</th>
                        <th>姓</th>
                        <th>名</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                    <?php foreach($staffs as $staff){ ?>
                    <tr>
                        <td><?= htmlspecialchars($staff['staff_id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($staff['staff_last_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($staff['staff_first_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <form action='editStaff.php' method='POST'>
                                <input type='submit' value='編集'>
                                <input type='hidden' name='edit_staff' value="<?=$staff['id']?>">
                            </form>
                        </td>
                        <td>
                            <form action='deleteStaff.php' method='POST'>
                                <input type='submit' value='削除'>
                                <input type='hidden' name='delete_staff' value="<?=$staff['id']?>">
                            </form>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/admin/Lower.php'); ?>