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