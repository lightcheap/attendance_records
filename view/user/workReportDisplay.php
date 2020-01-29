<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Common.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/WorkReportRead.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <div class="workreportform">
            <h1>作業報告一覧</h1>
            <h2>年月</h2>
            <?php foreach($tasks as $task): ?>
            <p>作業日</p>
            <p><?= h($task['work_date'])?></p>
            <div class="table">
                <table>
                    <tr>
                        <th>開始時間</th>
                        <th>終了時間</th>
                        <th>業務区分</th>
                        <th>業務詳細</th>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time1'])?></td>
                        <td><?= h($task['end_time1'])?></td>
                        <td><?= h($task['work_classification1'])?></td>
                        <td><?= h($task['work_detail1'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time2'])?></td>
                        <td><?= h($task['end_time2'])?></td>
                        <td><?= h($task['work_classification2'])?></td>
                        <td><?= h($task['work_detail2'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time3'])?></td>
                        <td><?= h($task['end_time3'])?></td>
                        <td><?= h($task['work_classification3'])?></td>
                        <td><?= h($task['work_detail3'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time4'])?></td>
                        <td><?= h($task['end_time4'])?></td>
                        <td><?= h($task['work_classification4'])?></td>
                        <td><?= h($task['work_detail4'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time5'])?></td>
                        <td><?= h($task['end_time5'])?></td>
                        <td><?= h($task['work_classification5'])?></td>
                        <td><?= h($task['work_detail5'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time6'])?></td>
                        <td><?= h($task['end_time6'])?></td>
                        <td><?= h($task['work_classification6'])?></td>
                        <td><?= h($task['work_detail6'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time7'])?></td>
                        <td><?= h($task['end_time7'])?></td>
                        <td><?= h($task['work_classification7'])?></td>
                        <td><?= h($task['work_detail7'])?></td>
                    </tr>
                    <tr>
                        <td><?= h($task['start_time8'])?></td>
                        <td><?= h($task['end_time8'])?></td>
                        <td><?= h($task['work_classification8'])?></td>
                        <td><?= h($task['work_detail8'])?></td>
                    </tr>
                </table>
                <p class="work_dis_impression"><?= h($task['work_impression'])?></p>
            </div>
            <?php endforeach;?>
            </div>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_lower.html'); ?>

