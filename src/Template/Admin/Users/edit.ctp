<?php
//$this->params['controller'];
?>

<?= $this->Form->create($user, array('id' => 'userForm')) ?>
<section class="workspace">
    <div class="workspace-body">
        <div class="page-heading">
            <ol class="breadcrumb breadcrumb-small">
                <li><a href="<?=$this->Url->build(array('action' => 'index' )) ?>" title="<?= __('Patient') ?>"> <?= __('Patient') ?></a></li>
                <li class="active"><a href="#">Edit <?= __('Patient') ?></a></li>
            </ol>
        </div>

        <div class="main-container">
            <div class="content">
                <div class="page-wrap">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-hovered panel-stacked">
                                    <div class="panel-heading"><?= __('Edit Patient') ?></div>
                                    <?php echo $this->element('patient_element') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer ">
        <div class="flex-container">
            <a href="<?php echo $this->Url->build(array('action' => 'index' )) ?>" class="btn btn-default  btn-cancel" title="Cancel">Cancel</a>
            <div class="flex-item">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn save event-save']) ?>
            </div>
        </div>
    </footer>

</section>
<?= $this->Form->end() ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        //alert(SITE_URL+'admin/tests/is_test_available');

        jQuery('#userForm').validate({
            rules:{
                'phone': {
                    remote: {
                        url: SITE_URL+'admin/Users/isUserAvailable',
                        type: "post",
                        data: {
                            phone: function(){ return jQuery("#userPhone").val(); }
                        }
                    }
                }
            },
            messages: {
                'phone': {
                    remote: 'The Patient already exist.'
                }
            }
        });
    });
</script>