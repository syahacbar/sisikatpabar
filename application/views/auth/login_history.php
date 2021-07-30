<div class="container-fluid px-4">
    <h2 class="mt-4">Login History</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
       
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th width="10">No.</th>
                        <th width="200">Datetime</th>
                        <th>Username</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($loginhistory as $log) { ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $log['logintime'];?></td>
                        <td><?php echo $log['username'];?></td>
                        <td><?php echo $log['ipaddress'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Datetime</th>
                        <th>Username</th>
                        <th>IP Address</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>