// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal_reg = document.getElementById('id_reg');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_reg) {
        modal_reg.style.display = "none";
    }
}

function delet_f(int id) {
      $.ajax({
           type: "POST",
           url: 'delet.php',
           data: {
            
           }
           success: function(data) {
            if (data){
              window.location.reload(); // This is not jQuery but simple plain ol' JS
            } else {
              alert("error");
            }
          }
      });
 }