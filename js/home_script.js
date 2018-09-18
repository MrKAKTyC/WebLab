var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal_reg = document.getElementById('id_reg');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_reg) {
        modal_reg.style.display = "none";
    }
}


// New try
   $(document).ready(function(){
      $("#snd").click(function(){
        let name_val = document.getElementById("name").value;
        let mail_val = document.getElementById("mail").value;
        let msg_val = document.getElementById("text").value;

          $.post("pehape.php",
          {
            name: name_val,
            city: mail_val,
            msg: msg_val
          },
          function(data,status){
              alert(data);
          });
      });
  });

   $(document).ready(function(){
      $("#l_out").click(function(){
          $.post("logout.php",
          function(){
              location.reload(); 
          });
      });
      $("#l_in").click(function(){
        let log = $("#l_login").value;
        let pas = $("#l_psw").value;
        $.post("login.php",
            {
              login: log,
              password: pas
            },
            function(data){
              alert(data);
              location.reload();
            }
          )
      });
  });

function delet_user(user_id) {
    $.post("delet.php",
  {
    id: user_id
  },
  function(data){
      location.reload(); 
  });
}