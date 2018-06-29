var x;

function changecolors() {
    x = 1;
    setInterval(change, 1000);
}

function change() {
    if (x === 1) {
        color = "red";
        x = 2;
    } else {
        color = "green";
        x = 1;
    }

    document.getElementById('100').style.background = color;
}



// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//from check
var loc;
var speciality;
var hospital;
var doctor;
var speciality_id;
var loc_id;
var hospital_id;
var doctor_id;


function getSpecialityListing(x,y)
{loc=y;
loc_id=x;
//change image document.getElementById("image").src = "landscape.jpg";

    document.getElementById("location").style.display = "none";
	document.getElementById("speciality").style.display = "block";

   
}

function funcancel()
{

document.getElementById('id01').style.display='none';
document.getElementById('doctor').style.display='none';
document.getElementById('speciality').style.display='none';
document.getElementById('hospital').style.display='none';
document.getElementById('appointment').style.display='none';
document.getElementById('location').style.display='block';
}

function funback()
{
	
}

//For the speceality 
function funspeciality(evt, name,id) {
	speciality=name;
	speciality_id=parseInt(id);
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";

}


//function next
function funnext()
{
if(document.getElementById('speciality').style.display=='block')
{
	if(speciality ==null)
	{
	alert('Select the speciality Please');
	}
	else
	{
	fundispdoc();
	document.getElementById('speciality').style.display='none';
	document.getElementById('hospital').style.display='block';
	}

}

else if(document.getElementById('hospital').style.display=='block')
{
if(hospital_id ==null)
	{
	alert('Select the Hospital Please');
	}
	else
	{
	fundispdoc2();
	document.getElementById('hospital').style.display='none';
	document.getElementById('doctor').style.display='block';
	
	}
}

else if(document.getElementById('doctor').style.display=='block')
{
if(doctor_id ==null)
	{
	alert('Select the doctor Please');
	}
	else
	{
	fundispdoc3();
	document.getElementById('doctor').style.display='none';
	document.getElementById('appointment').style.display='block';
	
	}
}


}
	
function funhospital(evt,name,id,id2) 
{	
	hospital_id=parseInt(id);
	speciality_id=parseInt(id2);
	hospital=name;
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";

	
}

function fundoctor(evt,name,id,id2) 
{	
	hospital_id=parseInt(id2);
	doctor_id=parseInt(id);
	doctor=name;
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";

	
}	
//PHP
{

}



