<?php
    // popup iknow
    // 单一输入框
?>
<div class="modal fade" id="popup_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalVideoLabel">视频上传</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-offset-1 form-control-static" id="popup_video_label">题ID：</div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 form-control-static">
                        <input type="text" id="popup_video_qid" name="qid" value="" hidden>
                        <input type="file" style="width: 500px;" id="popup_video_text" name="video">          
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-offset-1 progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      </div>
                    </div>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="getFile()">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
