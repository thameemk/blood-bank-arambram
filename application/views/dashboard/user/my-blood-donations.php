<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Blood Donation Reports </strong>
                </div>
                <div class="scrolltable card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Date</th>
                                <th>Place</th>
                                <th>Status</th>
                                <th>Veified User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donationReports as $row) { ?>
                                <tr>
                                    <td><?= $row->report_id ?></td>
                                    <td><?= $row->donated_date ?></td>
                                    <td><?= $row->donated_place ?></td>
                                    <td><?= $row->is_verified ?></td>
                                    <td><?= $row->verified_admin ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>