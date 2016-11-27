/***********************************************

* Cross browser Marquee II- Dynamic Drive (www.dynamicdrive.com)

* This notice MUST stay intact for legal use

* Visit http://www.dynamicdrive.com/ for this script and 100s more.

***********************************************/

var delayb4scroll=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)

var marqueespeed=1 //Specify marquee scroll speed (larger is faster 1-10)

var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=marqueespeed

var pausespeed=(pauseit==0)? copyspeed: 0

var actualheight=''

function scrollmarquee(){

//if (parseInt(cross_marquee.style.top)<(actualheight*(-1)+8))

//cross_marquee.style.top=(parseInt(cross_marquee2.style.top)+actualheight+8)+"px"

//if (parseInt(cross_marquee2.style.top)<(actualheight*(-1)+8))

//cross_marquee2.style.top=(parseInt(cross_marquee.style.top)+actualheight+8)+"px"



if (parseInt(cross_marquee.style.top)<(actualheight*(-1)))

cross_marquee.style.top=(parseInt(cross_marquee2.style.top)+actualheight)+"px"

if (parseInt(cross_marquee2.style.top)<(actualheight*(-1)))

cross_marquee2.style.top=(parseInt(cross_marquee.style.top)+actualheight)+"px"


cross_marquee2.style.top=parseInt(cross_marquee2.style.top)-copyspeed+"px"

cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"

}

function initializemarquee(divmarquee,v1,v2,speed){

cross_marquee=document.getElementById(v1)

cross_marquee2=document.getElementById(v2)


cross_marquee.style.top=0

marqueewidth=document.getElementById(divmarquee).offsetHeight

actualheight=cross_marquee.offsetHeight

//cross_marquee2.style.top=actualheight+'px'
cross_marquee2.style.top=actualheight+4+'px'

cross_marquee2.innerHTML=cross_marquee.innerHTML

setTimeout('lefttime=setInterval("scrollmarquee()",' +speed+ ')', delayb4scroll)

}




var delayb4scrollaa=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)

var marqueespeedaa=1 //Specify marquee scroll speed (larger is faster 1-10)

var pauseitaa=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeedaa=marqueespeedaa

var pausespeedaa=(pauseitaa==0)? copyspeedaa: 0

var actualheightaa=''

function scrollmarqueeaa(){

//if (parseInt(cross_marquee.style.top)<(actualheight*(-1)+8))

//cross_marquee.style.top=(parseInt(cross_marquee2.style.top)+actualheight+8)+"px"

//if (parseInt(cross_marquee2.style.top)<(actualheight*(-1)+8))

//cross_marquee2.style.top=(parseInt(cross_marquee.style.top)+actualheight+8)+"px"



if (parseInt(cross_marqueeaa.style.top)<(actualheightaa*(-1)))

cross_marqueeaa.style.top=(parseInt(cross_marquee2aa.style.top)+actualheightaa)+"px"

if (parseInt(cross_marquee2aa.style.top)<(actualheightaa*(-1)))

cross_marquee2aa.style.top=(parseInt(cross_marqueeaa.style.top)+actualheightaa)+"px"


cross_marquee2aa.style.top=parseInt(cross_marquee2aa.style.top)-copyspeedaa+"px"

cross_marqueeaa.style.top=parseInt(cross_marqueeaa.style.top)-copyspeedaa+"px"

}

function initializemarqueeaa(divmarquee,v1,v2,speed){


cross_marqueeaa=document.getElementById(v1)

cross_marquee2aa=document.getElementById(v2)


cross_marqueeaa.style.top=0

marqueewidthaa=document.getElementById(divmarquee).offsetHeight

actualheightaa=cross_marqueeaa.offsetHeight

cross_marquee2aa.style.top=actualheightaa+'px'
//cross_marquee2.style.top=actualheight+4+'px'

cross_marquee2aa.innerHTML=cross_marqueeaa.innerHTML

setTimeout('lefttime=setInterval("scrollmarqueeaa()",' +speed+ ')', delayb4scrollaa)
}

