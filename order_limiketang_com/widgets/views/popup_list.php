<?php
    // popup iknow
    // 单一输入框
?>
<!-- 定制版本的时候的指定学校 -->
<div class="modal fade" id="popup-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="groupTitle">转移题目类型至新的考点</h4>
            </div>
            <div class="modal-body">
                <form class="panel-body">
                    <div class="form-group" style="height: 35px;">
                        <label class="col-md-2 control-label">书本：</label>
                        <div class="col-md-10">
                            <select name="uid" id="bList" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="height: 35px;">
                        <label class="col-md-2 control-label">单元：</label>
                        <div class="col-md-10">
                            <select name="uid" id="uList" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="height: 35px;">
                        <label class="col-md-2 control-label">课时：</label>
                        <div class="col-md-10">
                            <select name="cid" id="cList" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="height: 35px;">
                        <label class="col-md-2 control-label">考点：</label>
                        <div class="col-md-10">
                            <select name="tid" id="tList" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="height: 35px;">
                        <label class="col-md-2 control-label">题目类型：</label>
                        <div class="col-md-10">
                            <select name="tid" id="gList" class="form-control">
                            </select>
                        </div>
                    </div>
                </form>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary moveTerm">确定</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          </div>
        </div>
    </div>
</div>