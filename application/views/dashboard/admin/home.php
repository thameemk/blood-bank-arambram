<div class="card">
    <div class="card-body">
        <div class="alert alert-primary text-center" role="alert">
            Click here to view <a href="<?= base_url() ?>admin/view-all-donors" class="alert-link">all donors registred</a> . (Total <?php echo count($allDonors) ?> )
        </div>
        <div class="alert alert-secondary  text-center" role="alert">
            Click here to view <a href="<?= base_url() ?>admin/active-donors" class="alert-link">all active donors registred </a> . (Total <?php echo count($allActiveDonors) ?> )
        </div>
        <div class="alert alert-success  text-center" role="alert">
            Click here to <a href="<?= base_url() ?>admin/add-donor" class="alert-link">add a new donor </a>
        </div>
        <div class="alert alert-danger  text-center" role="alert">
            Click here to <a href="<?= base_url() ?>admin/add-donation" class="alert-link">add a new donation</a>
        </div>
        <div class="alert alert-warning  text-center" role="alert">
            Click here to view <a href="<?= base_url() ?>admin/view-all-donations" class="alert-link">all donation </a> . (Total <?php echo count($allDonations) ?> )
        </div>
    </div>
</div>