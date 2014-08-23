//JK Popup Window Script (version 3.0)- By JavaScript Kit (http://www.javascriptkit.com)
//Visit JavaScriptKit.com for free JavaScripts
//This notice must stay intact for legal use
//Win Type: Pop Up | Always
    
//Specify URLs to randomly select from and popup/popunder:
//To display a single URL, just remove all but the first entry below:


function openpopup(){
var w = document.body.clientWidth, h = document.body.clientHeight;
var popW = 600, popH = 800;
var leftPos = (w - popW) / 2, topPos = (h - popH) / 2;
var winpops=window.open("../helpline/helpline.php","",'scrollbars,resizable,width=' + popW + ',height=' + popH + ',top=' + topPos + ', left=' + leftPos);
}