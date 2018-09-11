<?php
    // popup iknow
    // 单一输入框
?>
<div class="modal fade" id="popup_textarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">备注</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-offset-1 col-md-2 form-control-static" id="popup_textarea_label">备注内容:</div>
          <div class="col-md-8">
            <textarea class="form-control" id="popup_textarea_text" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">确定</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
