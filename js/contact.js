  // function send(){
  // console.log("begin");
  //   let name = document.getElementById("name");
  //   let mail = document.getElementById("mail");
  //   let text = document.getElementById("text");
  //   console.log(name.value);
  //   console.log(mail.value);
  //
  //       $.post("pehepe.php",
  //       {
  //         name: "Donald Duck",
  //         mail: "Duckburg"
  //       },
  //       function(data,status){
  //           alert("Data: " + data + "\nStatus: " + status);
  //       });
  // }

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
