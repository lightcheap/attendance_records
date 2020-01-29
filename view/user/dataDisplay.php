<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/attendanceDataRead.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php'); ?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="displayform">
            <h2>出退勤情報検索</h2>
                <label>月：
                    <select class="selectmonth"id="month">
                        <option value="1">1月</option>
                        <option value="2">2月</option>
                        <option value="3">3月</option>
                        <option value="4">4月</option>
                        <option value="5">5月</option>
                        <option value="6">6月</option>
                        <option value="7">7月</option>
                        <option value="8">8月</option>
                        <option value="9">9月</option>
                        <option value="10">10月</option>
                        <option value="11">11月</option>
                        <option value="12">12月</option>
                    </select>
                </label>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>日付</th>
                            <th>開始</th>
                            <th>終了</th>
                            <th>訓練</th>
                            <th>相談</th>
                            <th>休憩</th>
                            <th>休み</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody id="resultdata">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_lower.html'); ?>


