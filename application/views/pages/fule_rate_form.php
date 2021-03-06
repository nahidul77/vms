<div class="col-sm-12">
    <div class="panel panel-bd">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>
                    <?php
                    if (!empty($rates->v_fuel_id)) {
                        echo 'Fuel Rate Update';
                    } else {
                        echo 'Fuel Rate Create';
                    }
                    ?>
                </h4>
            </div>
        </div>
        <form name="notice" class="form-horizontal" id="notice-submit" action="<?php echo base_url() . 'fule_rate/save'; ?>" method="post">
            <div class="panel-body">
                <?php if (false) : ?>
                    <div class="form-group row">
                        <label for="v_id" class="col-sm-3 col-form-label"><?php echo display('vehicleregistrationnumber'); ?></label>
                        <div class="col-sm-9">
                            <?php echo form_dropdown('v_id', $v_id, set_value('v_id', $rates->v_id), 'id="v_id" required="required"  class="col-md-4 col-xs-12 testselect1"'); ?>
                            <?php echo form_error('v_id'); ?>
                        </div>
                        <div class="help-block" id="title-exists"><?php echo form_error('v_id'); ?></div>
                    </div>
                <?php endif ?>
                <div class="form-group row">
                    <label for="v_fuel_name" class="col-sm-3 col-form-label">Fuel Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="v_fuel_name" class="form-control" id="v_fuel_name" required="required" placeholder="Fuel Name" value="<?php echo set_value('v_fuel_name', $rates->v_fuel_name); ?>">
                        <div class="help-block" id="title-exists"><?php echo form_error('v_fuel_name'); ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="v_fuel_rate" class="col-sm-3 col-form-label"><?php echo display('fuelrate'); ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="v_fuel_rate" class="form-control" id="v_fuel_rate" placeholder="<?php echo display('fuel_rate'); ?>" required="required" value="<?php echo set_value('v_fuel_rate', $rates->v_fuel_rate); ?>">
                        <div class="help-block" id="title-exists"><?php echo form_error('v_fuel_rate'); ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vehicle_type" class="col-sm-3 col-form-label"><?php echo display('isactive'); ?></label>
                    <div class="col-sm-9">
                        <fieldset>
                            <div class="checkbox-circle">
                                <input name="active" type="radio" value="1" <?php echo set_radio('active', '1', TRUE); ?>>
                                <label for="checkbox7"><?php echo display('yes'); ?></label>

                                <input name="active" type="radio" value="0" <?php echo set_radio('active', '0'); ?>>
                                <label for="checkbox8"><?php echo display('no'); ?></label>
                            </div>

                        </fieldset>
                    </div>
                    <div class="help-block" id="title-exists"><?php echo form_error('active'); ?></div>
                </div>
                <input type="hidden" name="v_fuel_id" id="v_fuel_id" value="<?php echo set_value('v_fuel_id', $rates->v_fuel_id); ?>" />
                <div class="form-group row">
                    <div class="col-md-offset-1 col-md-9" style="margin-left: 35%;">
                        <a href="<?php echo base_url() . 'fule_rate'; ?>" class="btn btn-danger w-md m-b-5">Cancel</a>
                        <button type="submit" class="btn btn-success w-md m-b-5">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>