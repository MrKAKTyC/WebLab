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

// function delet_f(int id) {
//       $.ajax({
//            type: "POST",
//            url: 'delet.php',
//            success: function(data) {
//             if (data){
//               window.location.reload(); // This is not jQuery but simple plain ol' JS
//             } else {
//               alert("error");
//             }
//           }
//       });
//  }


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
  });