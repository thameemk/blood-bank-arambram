<div class="content mt-3">
    <?php if ($this->session->flashdata('fail')) : ?>
        <div class="alert alert-danger" role="alert">
            <center><?php echo $this->session->flashdata('fail'); ?></center>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <center><?php echo $this->session->flashdata('success'); ?></center>
        </div>
    <?php endif; ?>
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Blood Donation Reports </strong>
                    </div>
                    <div class="card-body">
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
</div>