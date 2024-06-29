function scrolldown() {

    var targetDiv = document.getElementById('target');
    var targetTop = targetDiv.offsetTop;
    var targetHeight = targetDiv.clientHeight;
    var windowHeight = window.innerHeight;

    // Calculate the scroll position to center the division vertically
    var scrollTo = targetTop - (windowHeight - targetHeight) / 2;

    // Smooth scroll to the calculated position
    window.scrollTo({ top: scrollTo, behavior: 'smooth' });

}

function scrolldown1() {

    var targetDiv = document.getElementById('target1');
    targetDiv.scrollIntoView({ behavior: 'smooth' });

}

function scrolldown2() {

    var targetDiv = document.getElementById('target2');
    targetDiv.scrollIntoView({ behavior: 'smooth' });

}

function scrolldown3() {

    var targetDiv = document.getElementById('target3');
    targetDiv.scrollIntoView({ behavior: 'smooth' });

}

function scrolldown4() {

    var targetDiv = document.getElementById('target4');
    targetDiv.scrollIntoView({ behavior: 'smooth' });
}

function registerview() {

    document.getElementById("signinbox").className = "d-none";
    document.getElementById("signupbox").className = "d-block";

}

function loginview() {

    document.getElementById("signupbox").className = "d-none";
    document.getElementById("signinbox").className = "d-block";

}

function register() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
document.getElementById("spinner").className = "spinner-grow text-warning d-block";

    var form = new FormData();

    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {

                

                setTimeout(function () {
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);





            } else {
                
              
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
               


              

                document.getElementById("warningbox").className = "col-12 ps-4 pe-4 d-block";
                document.getElementById("warningtext").innerHTML = response;
                
               


            }



        }

    }


    request.open("POST", "registerprocess.php", true);
    request.send(form);


}



function login() {

    var email = document.getElementById("email1");
    var pw = document.getElementById("password1");
    var remember = document.getElementById("rememberme");

                document.getElementById("spinner").className = "spinner-grow text-warning d-block";

    var form = new FormData();

    form.append("e", email.value);
    form.append("p", pw.value);
    form.append("r", remember.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {


                setTimeout(function () {
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);


                setTimeout(function () {
                    window.location = "index.php";
                }, 3000); // 3000 milliseconds (3 seconds)

            } else {

              
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
              

                document.getElementById("warningbox1").className = "col-12 ps-4 pe-4 d-block";
                document.getElementById("warningtext1").innerHTML = response;
                
                

            }



        }

    }

    request.open("POST", "loginprocess.php", true);
    request.send(form);


}


function logout() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                window.location.reload();
            }
        }
    }

    request.open("GET", "logOutProcess.php", true);
    request.send();
}

var mm;
function viewmodal1() {

    var Modal1 = document.getElementById("modal1");
    mm = new bootstrap.Modal(Modal1);
    mm.show();

}


function change() {
    var img = document.getElementById("profileimage");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("profimage").src = url;
    }
}


function saveprofimage() {
    var image = document.getElementById("profileimage");
      document.getElementById("spinner").className = "spinner-grow text-warning d-block";
    
    var form = new FormData();
    form.append("i", image.files[0]);
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();
            if (response === "Success") {
                
              
    
               setTimeout(function () {
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);

            } else {
                
               
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
               
                alert("An error occurred: " + response);
            }
        }
    };

    request.open("POST", "updateProfileimage.php", true);
    request.send(form);
}


function viewreceipt() {
    var img = document.getElementById("receipt");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("receiptimage").src = url;
    }


}







function getnow() {
    var flname = document.getElementById("flname").value;
    var srname = document.getElementById("srname").value;
    var address = document.getElementById("address").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;
    var division = document.getElementById("division").value;
    var nic = document.getElementById("nic").value;
    var dob = document.getElementById("bday").value;
    var bp = document.getElementById("bplace").value;
    var job = document.getElementById("job").value;
    var mobile = document.getElementById("mobile").value;
    var gender = document.getElementById("gender").value;
    var receipt = document.getElementById("receipt").files[0];
    var membership;
    
      document.getElementById("spinner2").className = "spinner-grow text-warning d-block";

    if (document.getElementById("membership1").checked) {
        var membership = "1";
    } else if (document.getElementById("membership2").checked) {
        var membership = "2";
    } else {
        var membership = "0";
    }

    var form = new FormData();
    form.append("fl", flname);
    form.append("sr", srname);
    form.append("add", address);
    form.append("pro", province);
    form.append("dis", district);
    form.append("div", division);
    form.append("nic", nic);
    form.append("dob", dob);
    form.append("bp", bp);
    form.append("j", job);
    form.append("m", mobile);
    form.append("g", gender);
    form.append("i", receipt);
    form.append("ty", membership);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "success") {

                setTimeout(function () {
                    document.getElementById("spinner2").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);

            } else {
                
                
                    document.getElementById("spinner2").className = "spinner-grow text-warning d-none";
                


               
                document.getElementById("erorbox").className = "col-12 mt-3 d-block";
                document.getElementById("eror").innerHTML = response;
                
                
            }



        }
    };

    request.open("POST", "getnowprocess.php", true);
    request.send(form);
}


var rm;
function viewmodal(email) {

    var Modalr = document.getElementById("modal" + email);
    rm = new bootstrap.Modal(Modalr);
    rm.show();

}




function accept(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {

                window.location.reload();

            } else {
                alert(response);
            }



        }

    }

    request.open("GET", "acceptprocess.php?e=" + email, true);
    request.send();


}


function reject(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {

                window.location.reload();

            } else {
                alert(response);
            }



        }

    }

    request.open("GET", "rejectprocess.php?e=" + email, true);
    request.send();



}


var vm;
function viewdetais(email) {
    var Modalv = document.getElementById("modal" + email);
    vm = new bootstrap.Modal(Modalv);
    vm.show();

}


function remove(email) {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {

                window.location.reload();

            } else {
                alert(response);
            }



        }

    }

    request.open("GET", "removeprocess.php?e=" + email, true);
    request.send();

}


function updatenow(id) {

    var flname = document.getElementById("flname").value;
    var srname = document.getElementById("srname").value;
    var address = document.getElementById("address").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;
    var division = document.getElementById("division").value;
    var nic = document.getElementById("nic").value;
    var dob = document.getElementById("bday").value;
    var bp = document.getElementById("bplace").value;
    var job = document.getElementById("job").value;
    var mobile = document.getElementById("mobile").value;
    var gender = document.getElementById("gender").value;
    var receipt = document.getElementById("receipt").files[0];
    var membership;
    
      document.getElementById("spinner1").className = "spinner-grow text-warning d-block";

    if (document.getElementById("membership1").checked) {
        var membership = "1";
    } else if (document.getElementById("membership2").checked) {
        var membership = "2";
    } else {
        var membership = "0";
    }

    var form = new FormData();
    form.append("fl", flname);
    form.append("sr", srname);
    form.append("add", address);
    form.append("pro", province);
    form.append("dis", district);
    form.append("div", division);
    form.append("nic", nic);
    form.append("dob", dob);
    form.append("bp", bp);
    form.append("j", job);
    form.append("m", mobile);
    form.append("g", gender);
    form.append("i", receipt);
    form.append("ty", membership);
    form.append("mid", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "success") {

               setTimeout(function () {
                    document.getElementById("spinner1").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);

            } else {
                
               
                    document.getElementById("spinner1").className = "spinner-grow text-warning d-none";
             


                
                  
                
                document.getElementById("erorbox").className = "col-12 mt-3 d-block";
                document.getElementById("eror").innerHTML = response;
            }



        }
    };

    request.open("POST", "updatenowprocess.php", true);
    request.send(form);

}


function changeeventImage() {

    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }
        } else {
            alert(file_count + "files. You are proceed to upload only 3 or less than 3 files.")
        }
    }
}



function addnow() {

    var header = document.getElementById("header");
    var prg = document.getElementById("paregraph")
    var image = document.getElementById("imageuploader");
document.getElementById("spinner").className = "spinner-grow text-warning d-block";

    var form = new FormData();

    form.append("h", header.value);
    form.append("p", prg.value);



    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        form.append("image" + x, image.files[x]);
    }

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;


            if (response == "success") {

             

                setTimeout(function () {
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                    location.reload();
                }, 3000);

            } else {
               
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                


               
                   
               
                alert(response);

            }






        }

    }

    request.open("POST", "addeventprocess.php", true);
    request.send(form);


}



function adminlogin() {

    var email = document.getElementById("email");

    var pass = document.getElementById("password");
document.getElementById("spinner").className = "spinner-grow text-warning d-block";

    var form = new FormData();

    form.append("e", email.value);
    form.append("p", pass.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {
                
                setTimeout(function () {
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
                }, 3000);


                setTimeout(function () {
                    // Refresh the page
                     window.location = "adminpanel.php"
                }, 3000);

               
            } else {
                
                    document.getElementById("spinner").className = "spinner-grow text-warning d-none";
               


              
                 document.getElementById("warningbox1").className = "col-12 ps-4 pe-4 d-block";
                document.getElementById("warningtext1").innerHTML = response;
            }



        }

    }

    request.open("POST", "adminloginprocess.php", true);
    request.send(form);

}



function adminsignout() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                window.location = "adminlogin.php";
            }
        }
    }

    request.open("GET", "adminlogOutProcess.php", true);
    request.send();


}


function deleteevent(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {

                window.location.reload();

            } else {
                alert(response);
            }



        }

    }

    request.open("GET", "deleteeventprocess.php?i=" + id, true);
    request.send();



}


function autoremovemember() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            if (response == "success") {
                alert("removed");
                window.location.reload();
            } else {
                alert("No expired members");
            }

        }

    }

    request.open("GET", "autoremovrmemberprocess.php", true);
    request.send();


}




var fgm;
function viewforgotmodal() {

    var email = document.getElementById("email1");

    document.getElementById("spinner").className = "spinner-grow text-warning d-block";
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("spinner").className = "spinner-grow text-warning d-none";

                var Modalfg = document.getElementById("forgotmodal");
                fgm = new bootstrap.Modal(Modalfg);
                fgm.show();
            } else {
                document.getElementById("warningtext1").innerHTML = response;
                document.getElementById("warningbox1").className = "d-block";
            }

        }
    }

    request.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    request.send();

}








function showPassword1() {
    var textfield = document.getElementById("np");
    var button = document.getElementById("npb");

    if (textfield.type == "password") {
        textfield.type = "text";
        document.getElementById("icon").className = "bi bi-eye-fill";
    } else {
        textfield.type = "password";
        document.getElementById("icon").className = "bi bi-eye-slash-fill";
    }
}

function showPassword2() {
    var textfield = document.getElementById("rnp");
    var button = document.getElementById("rnpb");

    if (textfield.type == "password") {
        textfield.type = "text";
        document.getElementById("icon1").className = "bi bi-eye-fill";
    } else {
        textfield.type = "password";
        document.getElementById("icon1").className = "bi bi-eye-slash-fill";
    }
}



function resetPassword() {

    var email = document.getElementById("email1");
    var newPassword = document.getElementById("np");
    var retypePassword = document.getElementById("rnp");
    var verification = document.getElementById("vcode");

    var form = new FormData();
    form.append("e", email.value);
    form.append("n", newPassword.value);
    form.append("r", retypePassword.value);
    form.append("v", verification.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                alert("Password updated successfully.");
                
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(form);

}


function search() {

    var text = document.getElementById("searcht").value;

    var form = new FormData();

    form.append("t", text);
   

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {

            var response = request.responseText;

            document.getElementById("basicSearchResult").innerHTML = response;

        }
    }

    request.open("POST", "basicsearchprocess.php", true);
    request.send(form);


}


  