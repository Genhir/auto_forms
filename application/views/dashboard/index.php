<div class="content">
    <div class="container-fluid">    
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h4 class="title"><?= $this->lang->line('my_website') ?></h4>
                        <p class="category"><?= $this->lang->line('in_real_time') ?></p>
                    </div>
                    <div class="content">                               
                        <iframe src="#" frameborder="0" id="iframe-real-time"></iframe>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h4 class="title"><?= $this->lang->line('tasks') ?></h4>
                        <p class="category"><?= $this->lang->line('to-do-list') ?></p>

                        <h5 class="title empty-task <?= ($tasks)?'hidden':'' ?>"><br><br><i class="pe-7s-medal"></i> <?= $this->lang->line('dont_have_tasks') ?></h5>
                    </div>
                    <div class="content">                      
                        <div class="table-full-width">
                            <table class="table" id="tasks">
                                <tbody>
                                    <?php foreach ($tasks as $task) { ?>
                                    <tr id="tr-task-<?= $task->id ?>">
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="<?= $task->id ?>" data-toggle="checkbox" <?= ($task->state == 1)?'checked=""':'' ?> >
                                            </label>
                                        </td>
                                        <td><?= $task->description ?> <?= ($task->is_private == 1)?'<i class="pe-7s-lock" rel="tooltip" title="Private"></i>':'' ?></td>
                                        <?php if($task->administrator_id == $this->session->userdata('logged_in')['user_id']){ ?>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="<?= $this->lang->line('edit_task') ?>" class="edit-task btn btn-warning btn-simple btn-xs" data-task="<?= $task->id ?>" data-description="<?= $task->description ?>" data-privacy="<?= $task->is_private ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="<?= $this->lang->line('remove') ?>" class="delete-task btn btn-default btn-simple btn-xs" data-task="<?= $task->id ?>"> 
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h4 class="title"><?= $this->lang->line('new_task') ?></h4>
                    </div>
                    <div class="content">                      
                        <div class="table-full-width">
                            <table class="table new-task">
                                <tbody id="form-create-task">
                                    <tr>
                                        <td colspan="2">
                                            <textarea placeholder="<?= $this->lang->line('description') ?>"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label><?= $this->lang->line('privacy') ?></label>
                                                <select name="privacy" class="form-control">
                                                    <option value="0"><?= $this->lang->line('public') ?></option>
                                                    <option value="1"><?= $this->lang->line('private') ?></option>
                                                </select>
                                            </div> 
                                        </td>
                                        <td class="text-right">
                                            <button type="button" class="create-task btn btn-warning btn-fill"><?= $this->lang->line('create') ?></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="edit-task" class="modal fade" role="dialog" data-backdrop="false">
                <div class="modal-dialog modal-md">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?= $this->lang->line('edit_task') ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="table-full-width">
                                <table class="table edit-task">
                                    <tbody id="form-edit-task">
                                        <tr>
                                            <td colspan="2">
                                                <textarea placeholder="<?= $this->lang->line('description') ?>"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label><?= $this->lang->line('privacy') ?></label>
                                                    <select name="privacy" class="form-control select-privacy">
                                                        <option value="0"><?= $this->lang->line('public') ?></option>
                                                        <option value="1"><?= $this->lang->line('private') ?></option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <button type="button" class="update-task btn btn-warning btn-fill btn-simple btn-md"><?= $this->lang->line('update') ?></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>    

        </div>        
    </div>    
</div>