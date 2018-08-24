function append_error(form_group, error_msg) {
	form_group.addClass('has-error');
	form_group.find('.error-msg').remove();
	form_group.find('.glyphicon-remove').remove();
	form_group.append('<span class="help-block error-msg">'+error_msg+'</span>');
	form_group.append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
}

function remove_error(form_group) {
	form_group.removeClass('has-error');
	form_group.find('.error-msg').remove();
	form_group.find('.glyphicon-remove').remove();
}

function append_success(form_group) {
	form_group.addClass('has-success');
	form_group.find('.glyphicon-ok').remove();
	form_group.append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
}

function remove_success(form_group) {
	form_group.removeClass('has-success');
	form_group.find('.glyphicon-ok').remove();
}
$(function(){
	$('.btn-delete').on('click',function(){
		if (!confirm('确定要删除吗?')) {
			return false;
		}
	})
});
