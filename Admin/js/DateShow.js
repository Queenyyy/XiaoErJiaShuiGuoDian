// JavaScript Document
var week; 
	if(new Date().getDay()==0)          week="������"
	if(new Date().getDay()==1)          week="����һ"
	if(new Date().getDay()==2)          week="���ڶ�" 
	if(new Date().getDay()==3)          week="������"
	if(new Date().getDay()==4)          week="������"
	if(new Date().getDay()==5)          week="������"
	if(new Date().getDay()==6)          week="������"
document.write(new Date().getFullYear()+"��"+(new Date().getMonth()+1)+"��"+new Date().getDate()+"�� "+week);









//var myDate = new Date();    

//myDate.getYear();       //��ȡ��ǰ���(2λ)    

//myDate.getFullYear();   //��ȡ���������(4λ,1970-????)  

//myDate.getMonth();      //��ȡ��ǰ�·�(0-11,0����1��)��Ҫ��1�� 

//myDate.getDate();       //��ȡ��ǰ��(1-31)    

//myDate.getDay();        // ��ȡ��ǰ����X(0-6,0����������)    

//myDate.getTime();       //��ȡ��ǰʱ��(��1970.1.1��ʼ�ĺ�����)    

//myDate.getHours();      //��ȡ��ǰСʱ��(0-23)    

//myDate.getMinutes();    // ��ȡ��ǰ������(0-59)    

//myDate.getSeconds();    //��ȡ��ǰ����(0-59)    

//myDate.getMilliseconds();   //��ȡ��ǰ������(0-999)    

//myDate.toLocaleDateString();    //��ȡ��ǰ����    

//var mytime=myDate.toLocaleTimeString();    //��ȡ��ǰʱ��    

//myDate.toLocaleString( );       //��ȡ������ʱ�� 
