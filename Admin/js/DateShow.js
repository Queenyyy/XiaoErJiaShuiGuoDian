// JavaScript Document
var week; 
	if(new Date().getDay()==0)          week="星期日"
	if(new Date().getDay()==1)          week="星期一"
	if(new Date().getDay()==2)          week="星期二" 
	if(new Date().getDay()==3)          week="星期三"
	if(new Date().getDay()==4)          week="星期四"
	if(new Date().getDay()==5)          week="星期五"
	if(new Date().getDay()==6)          week="星期六"
document.write(new Date().getFullYear()+"年"+(new Date().getMonth()+1)+"月"+new Date().getDate()+"日 "+week);









//var myDate = new Date();    

//myDate.getYear();       //获取当前年份(2位)    

//myDate.getFullYear();   //获取完整的年份(4位,1970-????)  

//myDate.getMonth();      //获取当前月份(0-11,0代表1月)（要加1） 

//myDate.getDate();       //获取当前日(1-31)    

//myDate.getDay();        // 获取当前星期X(0-6,0代表星期天)    

//myDate.getTime();       //获取当前时间(从1970.1.1开始的毫秒数)    

//myDate.getHours();      //获取当前小时数(0-23)    

//myDate.getMinutes();    // 获取当前分钟数(0-59)    

//myDate.getSeconds();    //获取当前秒数(0-59)    

//myDate.getMilliseconds();   //获取当前毫秒数(0-999)    

//myDate.toLocaleDateString();    //获取当前日期    

//var mytime=myDate.toLocaleTimeString();    //获取当前时间    

//myDate.toLocaleString( );       //获取日期与时间 
