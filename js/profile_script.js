function change_data(){
	let old_login = $("#u_login").val();
	let old_name  = $("#u_name").val();
	let old_surname = $("#u_surname").val();
	let old_role = $("#u_role").val();
	console.log(old_name+" "+old_surname+" "+old_login+" "+old_role);
	$.post("update_info.php",
		{
			name : old_name,
			sname : old_surname,
			role : old_role,
			u_name : old_login
		},
		function(data){
			// alert(data);
		});
}

function change_password() {
	let oldpas = $("#u_oldpsw").val();
	let newpas = $("#u_newpsw").val();
	let newpas2 = $("#u_sbmtpsw").val();
	let name = $("#psw_u_name").val();
	console.log(oldpas+" "+newpas+" "+newpas2+" "+name);
	$.post("update_psw.php",
		{
			old_psw : oldpas,
			new_psw : newpas,
			new_psw2 : newpas2,
			u_name : name
		},
		function(data){
			alert(data);
		});
}

function change_image(){
	let user_name = $("#foto_user_name").val();
	let old_photo_file = $("#old_photo").val();
	// let new_photo_file = $("#fileToUpload").val();
	let Form_with_data = new FormData();
	let files = $('#fileToUpload')[0].files[0];
	Form_with_data.append('u_name',user_name);
	Form_with_data.append('old_photo',old_photo_file);
	Form_with_data.append('new_photo',files);
	console.log(user_name+" "+old_photo_file);
    $.ajax({
    url: 'update_foto.php',
    type: 'post',
    data: Form_with_data,
    contentType: false,
    processData: false,
    success: function(data, response) {
        if(response != 0){
            $("#prof_pic").delay( 2000 ).attr( 'src', old_photo_file + '?dt='+ (new Date()));
        }else{
            alert('file not uploaded');
        }
    },
    });
}

function go_home() {
	window.location.replace("index.php");
}


