function calculatemodULO(){
	
	var a = document.getElementById("in1").value;
	var b = document.getElementById("in2").value;

	var c = a % b;
	document.getElementById("wynikmodULO").innerHTML = c;
}
