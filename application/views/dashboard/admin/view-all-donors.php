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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Blood Group</th>
                                <th>Verify</th>
                                <th>View Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allDonors as $row) { ?>
                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['blood_group'] ?></td>
                                    <td>
                                        <?php if ($row['is_verified'] == 1) { ?>
                                            <span class="btn btn-success">Verified</span>
                                        <?php } elseif ($row['is_verified'] == 0) { ?>
                                            <form method="post" action="<?= base_url() ?>Admin/verify_user">
                                                <input type="hidden" name="email" value="<?= $row['email'] ?>">
                                                <button type="submit" class="btn btn-warning">Verify</button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary">View</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>