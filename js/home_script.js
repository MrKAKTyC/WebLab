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

function log_in(){
  let log = $("#l_login").val();
  let pas = $("#l_psw").val();
  drawTab();

}   

function log_out(){
  $.post("logout.php",
    function(data){
        // change logout to login
        $("#ac_action").html('<button onclick="$(\'#id01\').show()" style="width:auto;">Login</button>');
        // change user name
        $("#Greeting").text('Welcome, guest');
        // change links to tab logins
        $("th:last-child").remove();
        $("tr").each(function(index, element){
            let name = $("td:nth-child(2)", element).text();
            $("td:nth-child(2)", element).html(name);
          });
        // remove X btn
          $("tr").each(function(index, element){
            $("td:last-child", element).remove();
          });
        // remove ADD btn 
        $("#add_usr").remove();
        window.location.replace("index.php");
        });
  // ADD REDIRECT TO INDEX.PHP!!!
}

function delet_user(user_id) {
    $.post("delet.php",
  {
    id: user_id
  },
  function(data){
        $('#'+user_id).remove();
  });
}

function add_user() {
  let log = $("#r_login").val();
  let pas = $("#r_psw").val();
  let role = $("#r_role").val();
  let name = $("#r_name").val();
  let surname = $("#r_surname").val();
  $.post("register.php",
      {
        login: log,
        psw: pas,
        role: role,
        name: name,
        surname: surname
      },
      function(data){
        console.log(data);
        let new_row = $("<tr></tr>").html(data);
        $("#main_tab").append(new_row);
        $('#id_reg').hide();
      })
}