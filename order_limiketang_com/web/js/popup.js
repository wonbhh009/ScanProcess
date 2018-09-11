/**
 * 通用弹出窗口
 */
var popup = {};

/*
 * 我知道了
 * @param msg 正文内容
 * @param callback 确定按键的回调
 * @param btnok 确定按键的显示文本
 * @param title 窗口标题
 */
popup.iknow = function(msg,callback,btntext,title)
{
	if (title == undefined) title = '提示';
	if (btntext == undefined) btntext = '我知道了';

	// 标题栏
	$("#popup_iknow .modal-title").html(title);
	// 正文区
	$("#popup_iknow .modal-body").html(msg);
	// 确定按键
	$("#popup_iknow .btn-primary").html(btntext);

	// $('#popup_iknow .modal-dialog').css({
	//     'margin-top': function () {
	// 	return (($(window).height()-210) / 2);
	// 	}
	// });

	// 设置回调
	if (callback != undefined){
		$('#popup_iknow .btn-primary').unbind("click").click(function(){
			callback();
		})
	}

	// 展现
	$('#popup_iknow').modal('show');
};

/*
 * 确定/取消
 * @param msg 正文内容
 * @param callback 确定按键的回调
 * @param btnok 确定按键的显示文本
 * @param title 窗口标题
 */
popup.confirm = function(msg,callback,btntext,title)
{
	if (title == undefined) title = '提示';
	if (btntext == undefined) btntext = '确定';

	// 标题栏
	$("#popup_confirm .modal-title").html(title);
	// 正文区
	$("#popup_confirm .modal-body").html(msg);
	// 确定按键
	$("#popup_confirm .btn-primary").html(btntext);

	// $('#popup_confirm .modal-dialog').css({
	//     'margin-top': function () {
	// 	return (($(window).height()-210) / 2);
	// 	}
	// });

	// 设置回调
	if (callback != undefined){
		$('#popup_confirm .btn-primary').unbind("click").click(function(){
			callback();
		})
	}

	// 展现
	$('#popup_confirm').modal('show');
};


/*
 * 输入一个数据
 * @param label 标签
 * @param callback 确定按键的回调
 * @param btnok 确定按键的显示文本
 * @param title 窗口标题
 */
popup.input = function(label,callback,btntext,title)
{
	if (title == undefined) title = '提示';
	if (btntext == undefined) btntext = '确定';

	// 标题栏
	$("#popup_input .modal-title").html(title);
	// 正文区
	$("#popup_input_label").html(label);
	// 确定按键
	$("#popup_input .btn-primary").html(btntext);

	// $('#popup_confirm .modal-dialog').css({
	//     'margin-top': function () {
	// 	return (($(window).height()-210) / 2);
	// 	}
	// });

	// 设置回调
	if (callback != undefined){
		$('#popup_input .btn-primary').unbind("click").click(function(){
			callback();
		})
	}

	// 展现
	$('#popup_input').modal('show');
};

/*
 * 输入备注性数据
 * @param label 标题
 * @param callback 确定按键的回调
 * @param btnok 确定按键的显示文本
 * @param title 窗口标题
 */
popup.textarea = function(label,callback,btntext,title)
{
	if (title == undefined) title = '备注';
	if (btntext == undefined) btntext = '确定';

	// 标题栏
	$("#popup_textarea .modal-title").html(title);
	// 正文区
	$("#popup_textarea_label").html(label);
	// 确定按键
	$("#popup_textarea .btn-primary").html(btntext);

	// $('#popup_confirm .modal-dialog').css({
	//     'margin-top': function () {
	// 	return (($(window).height()-210) / 2);
	// 	}
	// });

	// 设置回调
	if (callback != undefined){
		$('#popup_textarea .btn-primary').unbind("click").click(function(){
			callback();
		})
	}

	// 展现
	$('#popup_textarea').modal('show');
};

/*
 * 空白
 * @param msg 正文内容
 * @param title 窗口标题
 */
popup.empty = function(msg,title,precall)
{
	if (title == undefined) title = '提示';
	// 标题栏
	$("#popup_empty .modal-title").html(title);
	// 正文区
	$("#popup_empty .modal-body").html(msg);
	// 预执行
	if (precall != undefined){
		precall();
	}
	// 展现
	$('#popup_empty').modal('show');
};

/*
 * 关闭所有弹窗
 */
popup.closeAll = function()
{
	$('#popup_iknow').modal('hide');
	$('#popup_confirm').modal('hide');
	$('#popup_empty').modal('hide');
	$('#popup_input').modal('hide');
	$('#popup_textarea').modal('hide');
};

/**
 * 弹出上传音频的对话框
 */
popup.uploadAudio = function(obj)
{
	var filename = $(obj).data('filename');
	var fileurl  = (filename == '') ? '' : params.AliOSSExtQuestionMp3Url+filename;

	var html = '';
	html += '<form id="form-upload-audio" class="form" method="post" enctype="multipart/form-data" action="">';
	html += '   <div class="row form-group col-md-offset-1"><input type="file" id="input-upload" name="UploadForm[file]" /></div>';
	html += '   <div class="row form-group col-md-offset-1">';
	html += '       <div class="col-md-2" style="padding-left:0px;">';
	html += '           <div class="btn btn-default pull-left" onclick="doUploadAudio(\'form-upload-audio\')">上传文件</div>';
	html += '       </div>';
	html += '       <div class="col-md-10 audioWrap">';
	if (fileurl != '') {
	    html += '       <audio src="'+fileurl+'" controls="controls"></audio>';
	    html += '       <p>'+fileurl+'</p>';
	}
	html += '       </div>';
	html += '   </div>';
	html += '</form>';

	popup.confirm(html,function(){
		var imgSrc = $("#form-upload-audio audio").attr('src');
		var nameList = imgSrc.split('/');
		var audioName = nameList[nameList.length-1];
		// 回写至原有data
		$(obj).data('filename',audioName);
	},'确定','上传音频')
}
