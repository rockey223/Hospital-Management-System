
$(document).ready(function(){
    $('#login').on('click',function(event){
        var username = $("#username").val();
        var password = $("#password").val();
        var insert = /^[0-9]+$/;
        event.preventDefault();
        if(username=="" || username.length<3 || username.match(insert) )
        {
            $("#uerror").html("Enter Proper username");
            
            setTimeout(function()
            {  
                $('#uerror').fadeOut("Slow");  
            }, 2000);  
        }
        
        else{
            $.ajax(
                {
                    url: '../admin/login.php',
                    method: 'POST',
                    data:{
                        login: 1,
                        username: username,
                        password: password
                },
                beforeSend:function()
                {
                    $('#login').val("loging In");
                },

                success: function(response)
                {
                    if(response == "fail")
                    {
                        $("#error").html("Username or Password incorrect.");
                        
                        setTimeout(function()
                        {  
                            $('#error').fadeOut("Slow");  
                        }, 5000);  
                    }
                    else
                    {
                        
                        if(response.indexOf('sucess')>=0)
                        {
                            window.location='./pages/dashboard.php';
                        }
                    }
                    $('#login').val("Login");
                },
                dataType:'text'
            });
        }
    });
});


// Function to remove flex row on mobile devices
if (window.innerWidth < 991) {
    total.forEach(function(item, i) {
    if (item.classList.contains('flex-row')) {
      item.classList.remove('flex-row');
      item.classList.add('flex-column', 'on-resize');
    }
      });
    }
    function getEventTarget(e) {
e = e || window.event;
return e.target || e.srcElement;
}


const iconNavbarSidenav = document.getElementById('iconNavbarSidenav');
const iconSidenav = document.getElementById('iconSidenav');
const sidenav = document.getElementById('sidenav-main');
let body = document.getElementsByTagName('body')[0];
let className = 'g-sidenav-pinned';

if (iconNavbarSidenav) {
iconNavbarSidenav.addEventListener("click", toggleSidenav);
}

if (iconSidenav) {
iconSidenav.addEventListener("click", toggleSidenav);
}

function toggleSidenav() {
if (body.classList.contains(className)) {
  body.classList.remove(className);
  setTimeout(function() {
    sidenav.classList.remove('bg-white');
  }, 100);
  sidenav.classList.remove('bg-transparent');

} else {
  body.classList.add(className);
  sidenav.classList.add('bg-white');
  sidenav.classList.remove('bg-transparent');
  iconSidenav.classList.remove('d-none');
}
}
