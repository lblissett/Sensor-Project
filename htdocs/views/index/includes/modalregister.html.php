<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 14:41
 */
?>

<form id="formdata" action="admin.php?de=90002&adm_app=141&nf_data=Event/create" method="post">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create new Account</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group">
                        <label for="username" class="col-md-4 control-label label-element">Username</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label label-element">Your Email</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label label-element">Password</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="col-md-4 control-label label-element">Confirm Password</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modalSubmit" >Register</button>
                </div>
            </div>
        </div>
    </div>
</form>
