window.onload = function(){
    var title = document.getElementById('title');
    var ol = document.getElementsByTagName('ol')[0];
    var a = ol.getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
        a[i].className = null;
        if (title.innerHTML == a[i].innerHTML) {
            a[i].className = 'selected';
        };
        
            }
}
//修改等级
function checkUpdateForm(){
    var form = document.update;
    if (form.lever_name.value.length > 20 || form.lever_name.value == '') {
        alert('等级名称不得大于20位');
        lever_name.focus();
        return false;
    }
    //等级描述
    if (form.lever_info.value.length > 200) {
        alert('等级描述不得大于200位');
        form.lever_info.value = '';
        form.lever_info.focus();
        return false;
    }
    return true;
}

//添加等级
function checkAddForm(){
    var form = document.add
    //等级名称
    if (form.lever_name.value == '' || form.lever_name.value.length > 20) {
        alert('等级名称不得为空，并且不得大于20位');
        form.lever_name.value = '';
        form.lever_name.focus();
        return false;
    }
    //等级描述
    if (form.lever_info.value.length > 200) {
        alert('等级描述不得大于200位');
        form.lever_info.value = '';
        form.lever_info.focus();
        return false;
    }
    return true;
}
