<div class="card">
    <div class="header">
        <h2>
            <?php if (in_array(get_user_type(), [-1, 0])) { ?>
                LEARNING AND DEVELOPMENT (L&D) <br> INTERVENTIONS/TRAINING PROGRAMS ATTENDED
            <?php } ?>
            
            <button type="button" class="btn btn-primary waves-effect pull-right" onclick="$('#addModal').modal('show')">
                <i class="material-icons">add</i>
                <span>Add</span>
            </button>
        </h2>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">#</th>
                        <th rowspan="2" class="text-center">Title of Learning and Development Interventions/Training Programs</th>
                        <th colspan="2" class="text-center">Inclusive Dates of Attendance</th>
                        <th rowspan="2" class="text-center">Number of Hours</th>
                        <th rowspan="2" class="text-center">Type of LD (Managerial/Supervisory/Technical/etc.)</th>
                        <th rowspan="2" class="text-center">Conducted/Sponsored by</th>
                        <th rowspan="2" style="min-width: 110px;"></th>
                    </tr>
                    <tr>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($info)) { ?>
                    <tr>
                        <td class="text-center text-danger" colspan="8">No data.</td>
                    </tr>
                    <?php } ?>

                    <?php foreach ($info as $key => $training) { ?>

                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$training->title?></td>
                        <td><?=$training->from?></td>
                        <td><?=$training->to?></td>
                        <td><?=$training->hours?></td>
                        <td><?=$training->type?></td>
                        <td><?=$training->sponsor?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-circle waves-float edit-button" 
                                onclick='editForm(<?=json_encode($training)?>)'
                                data-toggle="tooltip" 
                                data-placement="top" 
                                title="" 
                                data-original-title="Edit">
                                <i class="material-icons">edit</i>
                            </button>
                            <button 
                                type="button" 
                                class="btn btn-danger btn-circle waves-effect waves-circle waves-float delete-button"
                                onclick="deleteData('<?=$training->id?>')"
                                data-toggle="tooltip" 
                                data-placement="top" 
                                title="" 
                                data-original-title="Delete">
                                <i class="material-icons">delete</i>
                            </button></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>


<div class="modal fade in" data-backdrop="static" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-orange p-t-15 p-b-15">
                <h4 class="modal-title" id="defaultModalLabel">ADD TRAINING</h4>
            </div>
            <form action="<?=base_url('employee/Update_employee/add_training/')?>">
                <div class="form-horizontal modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Title of Learning and Development Interventions/Training Programs</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="title" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12">Inclusive Dates of Attendance</label>
                                <div class="col-sm-6">
                                    <div class="input-group m-b-0">
                                        <span class="input-group-addon">From</span>
                                        <div class="form-line demo-masked-input">
                                            <input name="from" type="text" class="form-control date" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group m-b-0">
                                        <span class="input-group-addon">To</span>
                                        <div class="form-line demo-masked-input">
                                            <input name="to" type="text" class="form-control date" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Number of Hours</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="hours" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Type of LD (Managerial/Supervisory/Technical/etc.)</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="type" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Conducted/Sponsored by</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="sponsor" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="$('#addModal').modal('hide')">CANCEL</button>
                    <button type="submit" class="btn btn-success waves-effect">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade in" data-backdrop="static" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-orange p-t-15 p-b-15">
                <h4 class="modal-title" id="defaultModalLabel">EDIT TRAINING</h4>
            </div>
            <form action="<?=base_url('employee/Update_employee/training/')?>">
                <input type="hidden" name="id">
                <div class="form-horizontal modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Title of Learning and Development Interventions/Training Programs</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="title" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12">Inclusive Dates of Attendance</label>
                                <div class="col-sm-6">
                                    <div class="input-group m-b-0">
                                        <span class="input-group-addon">From</span>
                                        <div class="form-line demo-masked-input">
                                            <input name="from" type="text" class="form-control date" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group m-b-0">
                                        <span class="input-group-addon">To</span>
                                        <div class="form-line demo-masked-input">
                                            <input name="to" type="text" class="form-control date" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Number of Hours</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="hours" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Type of LD (Managerial/Supervisory/Technical/etc.)</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="type" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-12">Conducted/Sponsored by</label>
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <input name="sponsor" type="text" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" onclick="$('#editModal').modal('hide')">CANCEL</button>
                    <button type="submit" class="btn btn-success waves-effect">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.table th, .table td {
    vertical-align: middle !important;
}
.card .header h2 {
    position: relative;
    min-height: 18px;
    text-transform: uppercase;
}
.card .header h2 button {
    right: 0;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
</style>