// JavaScript Document
function check_submit(){
	if(amendpwd.newpwd.value==""){
		alert("�����������룡");amendpwd.newpwd.focus();return false;
	}
	if(amendpwd.newpwdtwice.value==""){
		alert("��ȷ�������룡");amendpwd.newpwdtwice.focus();return false;
	}
	if(amendpwd.newpwd.value!=amendpwd.newpwdtwice.value){
	    alert("������������벻һ�£�");
		return false;
	}
	//found.submit();
}