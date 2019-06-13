

$(document).ready(function() {
    $('img').click(function(e) {
        var offset = $(this).offset();
        var X = (e.pageX - offset.left);
        var Y = (e.pageY - offset.top);
        $('#coord').text('X: ' + X + ', Y: ' + Y);
        //alert(calcCrow(X,Y,A,B).toFixed(1));
        getPoints(X,Y);
    });
});

	var A = 271;
	var B = 61;

	//alert(calcCrow(X,Y,A,B).toFixed(1));



    //This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
    function calcCrow(lat1, lon1, lat2, lon2) 
    {
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);

      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c;

      var estimate = Math.round(d);

      return estimate;
    }

    // Converts numeric degrees to radians
    function toRad(Value) 
    {
        return Value * Math.PI / 180;
    }


   function ramanujan(a,b){

    var m = a/2.5;
    var n = b/2.5;

   	var circ = ((3 * (m + n)) + (Math.sqrt((3*m + n)*(m + 3*n))));
    return circ;
   }

  

   function getPoints(X,Y) {

   	var A1;
   	var A2;
   	var B1;
   	var B2;
   	var C1;
   	var C2;
   	var D1;
   	var D2;
   	var E1;
   	var E2;
   	var F1;
   	var F2;
   	var G1;
   	var G2;
   	var H1;
   	var H2;
   	var ref1;
   	var ref2;

    if( typeof getPoints.counter == 'undefined' ) {
        getPoints.counter = 0;
    }

    if (getPoints.counter == 0) {

    	
      if( (typeof getPoints.A1 == 'undefined') && (typeof getPoints.A2 == 'undefined') ) 
      {
        getPoints.A1 = X;
        getPoints.A2 = Y;
        //alert("A1 is " + getPoints.A1 + "  A2 is " + getPoints.A2);
        document.getElementById("mySilo").src="../camera and fit/upload/Silo2.jpg";
      }
    }
    else if (getPoints.counter == 1) {

      
      if( (typeof getPoints.B1 == 'undefined') && (typeof getPoints.B2 == 'undefined') ) 
      {
        getPoints.B1 = X;
        getPoints.B2 = Y;
        //alert("B1 is " + getPoints.B1 + "  B2 is " + getPoints.B2);
        document.getElementById("myClient").src="../camera and fit/upload/Image_2.png";
        document.getElementById("mySilo").src="../camera and fit/upload/Silo3.jpg";
      }
    }
    else if (getPoints.counter == 2) {

      
      if( (typeof getPoints.C1 == 'undefined') && (typeof getPoints.C2 == 'undefined') ) 
      {
        getPoints.C1 = X;
        getPoints.C2 = Y;
        //alert("C1 is " + getPoints.C1 + "  C2 is " + getPoints.C2);
        document.getElementById("mySilo").src="../camera and fit/upload/Silo4.jpg";
        
      }
    }
    else if (getPoints.counter == 3) {

     
      if( (typeof getPoints.D1 == 'undefined') && (typeof getPoints.D2 == 'undefined') ) 
      {
        getPoints.D1 = X;
        getPoints.D2 = Y;
        //alert("D1 is " + getPoints.D1 + "  D2 is " + getPoints.D2);
        document.getElementById("mySilo").src="../camera and fit/upload/Silo5.jpg";
      }
    }
    else if (getPoints.counter == 4) {

      
      if( (typeof getPoints.E1 == 'undefined') && (typeof getPoints.E2 == 'undefined') ) 
      {
        getPoints.E1 = X;
        getPoints.E2 = Y;
        //alert("E1 is " + getPoints.E1 + "  E2 is " + getPoints.E2);
        document.getElementById("mySilo").src="../camera and fit/upload/Silo6.jpg";
      }
    }
    else if (getPoints.counter == 5) {

      
      if( (typeof getPoints.F1 == 'undefined') && (typeof getPoints.F2 == 'undefined') ) 
      {
        getPoints.F1 = X;
        getPoints.F2 = Y;
        //alert("F1 is " + getPoints.F1 + "  F2 is " + getPoints.F2);
        document.getElementById("myClient").src="../camera and fit/upload/Image_3.png";
        document.getElementById("mySilo").src="../camera and fit/upload/Silo7.jpg";
      }
    }
    else if (getPoints.counter == 6) {

      
      if( (typeof getPoints.G1 == 'undefined') && (typeof getPoints.G2 == 'undefined') ) 
      {
        getPoints.G1 = X;
        getPoints.G2 = Y;
        //alert("G1 is " + getPoints.G1 + "  G2 is " + getPoints.G2);
        document.getElementById("mySilo").src="../camera and fit/upload/Silo8.jpg";
      }
    }
    else if (getPoints.counter == 7) {

      
      if( (typeof getPoints.H1 == 'undefined') && (typeof getPoints.H2 == 'undefined') ) 
      {
        getPoints.H1 = X;
        getPoints.H2 = Y;
        //alert("H1 is " + getPoints.H1 + "  H2 is " + getPoints.H2);
        document.getElementById("myClient").src="../camera and fit/upload/Image_4.png";
        alert("Click on two points of the square");
      }
    }
    else if (getPoints.counter == 8) {

      
      if( (typeof getPoints.ref1 == 'undefined') && (typeof getPoints.ref2 == 'undefined') ) 
      {
        getPoints.ref11 = X;
        getPoints.ref12 = Y;
        //alert("ref1 is " + getPoints.ref1 + "  ref2 is " + getPoints.ref2);
        //alert("all measurements taken");
      }
    }
     else if (getPoints.counter == 9) {

      
      if( (typeof getPoints.ref1 == 'undefined') && (typeof getPoints.ref2 == 'undefined') ) 
      {
        getPoints.ref21 = X;
        getPoints.ref22 = Y;
        //alert("ref1 is " + getPoints.ref1 + "  ref2 is " + getPoints.ref2);
        alert("all measurements taken");
      }

      A1 = getPoints.A1;
      A2 = getPoints.A2;
      B1 = getPoints.B1;
      B2 = getPoints.B2;
      C1 = getPoints.C1;
      C2 = getPoints.C2;
      D1 = getPoints.D1;
      D2 = getPoints.D2;
      E1 = getPoints.E1;
      E2 = getPoints.E2;
      F1 = getPoints.F1;
      F2 = getPoints.F2;
      G1 = getPoints.G1;
      G2 = getPoints.G2;
      H1 = getPoints.H1;
      H2 = getPoints.H2;
      ref11 = getPoints.ref11;
      ref12 = getPoints.ref12;
      ref21 = getPoints.ref21;
      ref22 = getPoints.ref22;

      //salert("A1 is " + A1 + "and A2 is "+ A2);
      calculate(A1,A2,B1,B2,C1,C2,D1,D2,E1,E2,F1,F2,G1,G2,H1,H2,ref11,ref12,ref21,ref22);
    }
    

    getPoints.counter++;
    //alert("A1 is " + A1 + "A2 is " + Y);
    //salert(getPoints.counter);

    
 
}

function calculate(A1,A2,B1,B2,C1,C2,D1,D2,E1,E2,F1,F2,G1,G2,H1,H2,ref11,ref12,ref21,ref22){
    var sh1 = A1;
    var sh2 = A2;
    var sh3 = B1;
    var sh4 = B2;

    var shoulderLenghth = calcCrow(sh1,sh2,sh3,sh4);

    //alert("shoulder length is " + shoulderLenghth);

    var am1 = A1;
    var am2 = A2;
    var am3 = C1;
    var am4 = C2;

    var armLenghth = calcCrow(am1,am2,am3,am4);

    //alert("arm length is " + armLenghth);

    var sw1 = B1;
    var sw2 = B2;
    var sw3 = F1;
    var sw4 = F2;

    var shoulderToWaist = calcCrow(sw1,sw2,sw3,sw4);

    //alert("shoulder to waist length is " + shoulderToWaist);

    var wf1 = E1;
    var wf2 = E2;
    var wf3 = F1;
    var wf4 = F2;

    var waistFacingForward = calcCrow(wf1,wf2,wf3,wf4);

    //alert("waist facing forward is " + waistFacingForward);

    var ws1 = G1;
    var ws2 = G2;
    var ws3 = H1;
    var ws4 = H2;

    var waistFacingSideways = calcCrow(ws1,ws2,ws3,ws4);

    //alert("waist facing sideways is " + waistFacingSideways);

    waistCircumference = ramanujan(waistFacingForward,waistFacingSideways);

    //alert("waist Circumference is " + waistCircumference);
  
 
    var refObject1 = ref11;
    var refObject2 = ref12;
    var refObject3 = ref21;
    var refObject4 = ref22;

    var refObjectLength = calcCrow(refObject1,refObject2,refObject3,refObject4);

    //alert("reference object lenghth is " + refObjectLength);

    finalInches(shoulderLenghth,armLenghth,shoulderToWaist,waistCircumference,refObjectLength);
}

function finalInches(shoulderLenghth,armLenghth,shoulderToWaist,waistCircumference,refObjectLength){

  var finalRefObjectLength = refObjectLength;

  var finalShoulderLength  = (shoulderLenghth*11.7)/finalRefObjectLength;

  var finalArmLength  = (armLenghth*11.7)/finalRefObjectLength;

  var finalShoulderToWaist  = (shoulderToWaist*11.7)/finalRefObjectLength;

  var finalWaistCircumference  = (waistCircumference*11.7)/finalRefObjectLength;


  document.getElementById("shoulderLength").innerHTML = Math.round(finalShoulderLength) + " inches";

  document.getElementById("armLength").innerHTML = Math.round(finalArmLength) + " inches";

  document.getElementById("torsoHeight").innerHTML = Math.round(finalShoulderToWaist) + " inches";

  document.getElementById("waistLine").innerHTML = Math.round(finalWaistCircumference) + " inches";

  var shoulder = Math.round(finalShoulderLength);

  var arm = Math.round(finalArmLength);

  var torso = Math.round(finalShoulderToWaist);

  var waist = Math.round(finalWaistCircumference);

  

  metricPost(shoulder, arm, torso, waist);

  

}

function final(){
  

}


function metricPost(shoulder, arm, torso, waist){

  var shoulder = shoulder;
  var arm = arm;
  var torso = torso;
  var waist = waist;

  //var hello = "hello my friend";
 //var world = "welcome to my world";

  //$.post('../php/insertMetrics.php',{postmyShoulder:myShoulder, postmyArm:myArm, postmyTorso:myTorso, postmyWaist:myWaist});
  confirm("press OK if the measurements obtained look accurate?");

  window.location.href = "../php/insertMetrics.php?m1=" + shoulder + "&m2=" + arm + "&m3=" + torso + "&m4=" + waist;
}


