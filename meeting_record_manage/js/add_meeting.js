// JavaScript Document
function check_submit(){
	if(theForm.meeting_name.value==""){
		alert("�������Ʋ���Ϊ�գ�");theForm.meeting_name.focus();return false;
	}
	if(theForm.meeting_place.value==""){
		alert("����ص㲻��Ϊ�գ�");theForm.meeting_place.focus();return false;
	}
	if(theForm.meeting_host.value==""){
		alert("���������˲���Ϊ�գ�");theForm.meeting_host.focus();return false;
	}
	if(theForm.meeting_saver.value==""){
		alert("�����¼�˲���Ϊ�գ�");theForm.meeting_saver.focus();return false;
	}
	if(theForm.meeting_present.value==""){
		alert("��ϯ��Ա����Ϊ�գ�");theForm.meeting_present.focus();return false;
	}
	if(theForm.textarea.value==""){
		alert("����ժҪ����Ϊ�գ�");theForm.textarea.focus();return false;
	}
	theForm.submit();
	
}