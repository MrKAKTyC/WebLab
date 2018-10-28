var modal = document.getElementById('id01');
var login_sort_dir = "ASC"
var id_sort_dir = "ASC"

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

  $.ajax({
    url: "/Main/login",
    type: "POST",
    data:{
      login: log,
      password: pas
    },
    error: function(data, status){
      console.log(status);
    },
    complete: function(data) {
      console.log("done");
    },
    success: function(data){
      let result = $.parseJSON(JSON.stringify(data));
      console.log("done login");
      console.log(result);
        // change login to logout
        $("#ac_action").html('<button id = "l_out" onclick="log_out()" style="width:auto;" >Logoff</button>');
        // change user name
        $("#Greeting").text('Welcome, '+result.Login);
        // change tab logins to links
        $("th:last-child").after('<th>Видалити</th>');
        $("tr").each(function(index, element){
          let name = $("td:nth-child(2)", element).text();
          $("td:nth-child(2)", element).html('<a href=profile/show/'+name+'>'+name+'</a>');
        });
        // if admin add X btn
        if (result.role == 'admin') {
          $("tr").each(function(index, element){
            let txt = $("td:first-child", element).text();
            $("td:last-child", element).after('<td><button onclick="delet_user('+txt+')">X</button></td>');
          });
        // if admin add ADD btn 
        $("table").append($("<button id='add_usr' onclick=$('#id_reg').css('display','block')>Add new user</button>"));
      }
      $("#id01").hide();
    } 
  })
}   

function log_out(){
  $.post("/Main/logoff",
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
      });
}

function delet_user(user_id) {
  $.post("/Main/delet",
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
  $.post("/Main/register",
  {
    login: log,
    psw: pas,
    role: role,
    name: name,
    surname: surname
  },
  function(data){
    console.log(data);
    let content = "";
      content += "<tr id='"+data+"'>";
      content += "<td>"+data+"</td>";
      content += "<td>";
      if($('#l_out').length) {
        content += "<a href='profile.php?user="+log+"'>"+log+"</a>";
      } else {
        content += log;
      }
      "</td>";
      content += "<td>"+name+"</td>";
      content += "<td>"+surname+"</td>";
      content += "<td>"+role+"</td>";
      content += '<td><img src=img/def.png height="128" width="128"></td>';
      if($('#add_usr').length)
        content += '<td><button onclick="delet_user('+data+')">X</button></td>'; 
      content += "</tr>";
    $("#main_tab").append(content);
    $('#id_reg').hide();
  });
}

function sort(column){
  if(column == 'id'){
    col_dir = id_sort_dir;
  } else {
    col_dir = login_sort_dir;
  }
  $.post("/Main/sort/",
  {
    col: column,
    dir: col_dir
  },
  function(data){
    $('tr').not(":first").remove();
    let newTab = "";
    let result = $.parseJSON(data);
    for (x in result) {
      newTab += "<tr id='"+result[x].id+"'>";
      newTab += "<td>"+result[x].id+"</td>";
      newTab += "<td>";
      if($('#l_out').length) {
        newTab += "<a href='profile/show/"+result[x].Login+"'>"+result[x].Login+"</a>";
      } else {
        newTab += result[x].Login;
      }
      "</td>";
      newTab += "<td>"+result[x].Name+"</td>";
      newTab += "<td>"+result[x].Surname+"</td>";
      newTab += "<td>"+result[x].role+"</td>";
      newTab += '<td><img src='+result[x].Photo+' height="128" width="128"></td>';
      if($('#add_usr').length)
        newTab += '<td><button onclick="delet_user('+result[x].id+')">X</button></td>'; 
      newTab += "</tr>";
    }
    $("#main_tab").append(newTab);
  });

  login_sort_dir
  if(column == 'id'){
    if(id_sort_dir == "ASC"){
      id_sort_dir = "DESC";
    } else {
      id_sort_dir = "ASC";
    }
  }else{
    if(login_sort_dir == "ASC"){
      login_sort_dir = "DESC";
    } else {
      login_sort_dir = "ASC";
    }
  }
}