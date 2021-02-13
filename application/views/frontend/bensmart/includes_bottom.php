<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/jquery/dist/jquery.min.js' ?>"></script>

<script src="<?php echo base_url().'assets/frontend/bensmart/libs/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/aos/dist/aos.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/choices.js/public/assets/scripts/choices.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/countup.js/dist/countUp.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/dropzone/dist/min/dropzone.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/flickity/dist/flickity.pkgd.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/flickity-fade/flickity-fade.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/highlightjs/highlight.pack.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/imagesloaded/imagesloaded.pkgd.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/isotope-layout/dist/isotope.pkgd.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/jarallax/dist/jarallax.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/jarallax/dist/jarallax-video.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/jarallax/dist/jarallax-element.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/quill/dist/quill.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/smooth-scroll/dist/smooth-scroll.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/frontend/bensmart/libs/typed.js/lib/typed.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/global/toastr/toastr.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/frontend/default/js/select2.min.js'; ?>"></script>
<!-- Map 
<script src='../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
-->

<!-- Theme JS -->
<script src="<?php echo base_url().'assets/frontend/bensmart/js/theme.min.js' ?>"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>

<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('info_message') != ""):?>

<script type="text/javascript">
	toastr.info('<?php echo $this->session->flashdata("info_message");?>');
</script>

<?php endif;?>
